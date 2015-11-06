<?php
namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;

use Request;
use Validator;
use Auth;
use Carbon\Carbon;

use App\APIAuth;
use App\Customer;
use App\User;

class AuthController extends Controller
{
	//User Login Rute
    public function login()
    {
        //Email also should be verified, otherwise he should not allowed to be logged in, this should be implemented
        $postData       = Request::all();
        $remember_me    = true;

        //Validating the input
        $validator = Validator::make($postData,
                [
                    'login_name'    => 'required',
                    'password'      => 'required',
                ]);

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all()//"'user_name' or 'password' is missing !"
                                ],411);
        }

        //Logging In Attempt
        $credentials = array(                       //Names hould be as in DB columns
                                'login_name'    => strtolower($postData['login_name']) ,
                                'user_type'     => 'customer' ,
                                'password'      => $postData['password']
                            );

        //Logging In Failed
        if (!Auth::attempt($credentials, $remember_me))        //Authintication via remember_me
        {
            return response(
                                [
                                    "message" => "'user_name' or 'password' is wrong !"
                                ],406);
        }

        //Successfully Logged In

        $access_token = bin2hex(random_bytes(75));      //150/2=75, so 75 is used
        $expires_on   = Carbon::now()->addHours(72);

        //If found then update the access_token so that other API login will be autometically logged out
        if(APIAuth::where('user_id', '=', Auth::user()->id)->count() > 0)
        {
            $api_auth               = APIAuth::findOrFail(Auth::user()->id);
            $api_auth->access_token = $access_token;    //to prevent auto logging out for other login in API, comment this line
            $api_auth->ip           = Request::getClientIp(true);
            $api_auth->expires_on   = $expires_on;
            $api_auth->save();
        }
        // Insert New Entry
        else
        {
            APIAuth::Create(array(
                                    'user_id'       => Auth::user()->id,
                                    'access_token'  => $access_token,
                                    'ip'            => Request::getClientIp(true),
                                    'expires_on'    => $expires_on
                                ));
        }

    	return response()->json(
								[
									'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type,
                                    'access_token' => $access_token,
                                    'expires_on'   => $expires_on
								]
							);
    }

    ////User Logout
    public function logout()
    {
        $data = 0;
        if (Auth::check())
        {
            $postData       = Request::all();
            //Removing from API Login
            //APIAuth::findOrFail(Auth::user()->id)->forceDelete();         //Not so much secured - So, we are not using it
            $data = APIAuth::where('user_id', Auth::user()->id)                     //It is secured - so we are using it
                        ->where('access_token', $postData['access_token'])
                        ->delete();
                //Logging out the user
            if($data)
            {
                Auth::logout();
                $message = "Log Out Successfully";
            }
            else
                $message = "Bad 'access_token' provided";
        }
        else
            $message = "User Not Logged In, so no need to log out";

    	return response()->json(
    								[
    									'message'      => $message,
                                        'status'       => $data
    								]
    							);
    }

    //User Registration
    public function register()
    {
        $postData       = Request::all();
        $message        = "sss";
        $data           = 0;

        $validator = Validator::make($postData,
                        [
                            'first_name'    => 'required',
                            'last_name'     => 'required',
                            'login_name'    =>  'required|unique:users',
                            'password'      => 'required',
                            'neighbourhood' => 'required',
                            'email'         => 'required|email'
                        ]);

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all(),     //"'user_name' or 'password' is missing !"
                                    'status'  => $data
                                ],411);
        }
        else
        {
            $user=User::Create(array(
                                    'first_name'    => $postData['first_name'],
                                    'last_name'     => $postData['last_name'],
                                    'login_name'    => strtolower($postData['login_name']),
                                    'password'      => bcrypt($postData['password']),
                                    'user_type'     => 'customer',
                                    'referal_code'  => bin2hex(random_bytes(30))
                                ));
            Customer::Create(array(
                                    'user_id'       => $user->id,
                                    'neighbourhood' => $postData['neighbourhood'],
                                    'email'         => $postData['email']
                                ));
            $message = "Successfully registered, please verify your mail";
            $data    = 1;
        }

    	return response()->json(
    								[
    									'message'      => $message,
                                        'status'       => $data
    								]
    							);
    }
}
