<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private $token_length=150;
	//User Login
    public function login()
    {
        $access_token = bin2hex(random_bytes(150));
    	return Response::json(
								[
									'name'         => 'Abigail',
                                    'user_type'    => 'customer',
                                    'access_token' => $access_token,
                                    'allowed_for'  => '5 hour'
								]
							);
    }

    ////User Logout
    public function logout()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //User Registration
    public function register()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
