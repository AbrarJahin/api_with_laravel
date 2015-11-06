<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use Carbon\Carbon;
use DB;
use Auth;

class APIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Validate if 'access_token' and 'login_name' is existing or not in request
        $validator = Validator::make($request->input(),
                [
                    'access_token'    => 'required',
                    'login_name'      => 'required',
                ]);

        if ($validator->fails())
        {
            return response(
                                [
                                    "error" => $validator->messages()->all()//"'user_name' or 'password' is missing !"
                                ],401);
        }

        //Now check if the token is currect or wrong or token is valid or not
        $api_auth = DB::table('api_auth')
                    ->where('access_token', '=', $request->input('access_token'))
                    ->where('expires_on', '>=', Carbon::now()->toDateTimeString());

        if($api_auth->count()==0)
            return response(
                                [
                                    "error" => "Access Token invalid or expired"
                                ],
                            401);

        //Now check if the user is logged in or not, if not logged in, then log in him
        if (Auth::check())
        {// Check if logged in user is not current user
            if(Auth::user()->id!=$api_auth->get()[0]->user_id)
            {
                Auth::logout();
                return response(
                                    [
                                        "message" => "The access token owner user is not logged in"
                                    ],409);
            }
            elseif (Auth::user()->login_name!=$request->input('login_name'))
            {//If 
                Auth::logout();
                return response(
                                    [
                                        "message" => "User 'login_name' is wrong"
                                    ],422);
            }
        }
        else
        {//User Not Logged In
            return response(
                                    [
                                        "message" => "User not logged in"
                                    ],401);
            /*
            $credentials = array(                       //Names hould be as in DB columns
                                    'login_name'    => strtolower($request->input('login_name')),
                                    'id'            => $api_auth->get()[0]->user_id
                                );

            //Logging In Failed
            if (!Auth::attempt($credentials, true))        //Authintication via remember_me
            {
                return response(
                                    [
                                        "message" => "'login_name' is wrong"
                                    ],406);
            }
            */
        }

        //Now change the 'access_token' expire time
        DB::table('api_auth')
            ->where('user_id', Auth::user()->id)
            ->update(['expires_on' => Carbon::now()->addHours(72)]);

        //Now if everything OK, then go forword to what u need to do :)
        return $next($request);
    }
}
