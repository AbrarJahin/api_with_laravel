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

        $api_auth               = new APIAuth;
        $api_auth->user_id      = Auth::user()->id;
        $api_auth->access_token = bin2hex(random_bytes(150));
        $api_auth->ip           = Request::getClientIp(true);
        $api_auth->expires_on   = Carbon::now()->addHours(72);;
        $api_auth->save();

    	return response()->json(
								[
									'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type,
                                    'access_token' => $api_auth->access_token,
                                    'expires_on'   => $api_auth->expires_on
								]
							);
    }

    ////User Logout
    public function logout()
    {
    	return response::json(
								[
									//array of data
								]
							);
    }

    //User Registration
    public function register()
    {
    	return response::json(
								[
									//array of data
								]
							);
    }
}
