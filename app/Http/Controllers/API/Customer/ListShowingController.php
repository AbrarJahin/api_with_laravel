<?php
namespace App\Http\Controllers\API\Customer;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\API\APIAuth;

class ListShowingController extends APIAuth
{
    public function dummy()
    {
        //return response()->view('welcome');
        return response()->json([
                                    'name' => 'Abigail',
                                    'state' => 'CA',
                                    'states' => array(
                                                        'a' => "SSSSSS",
                                                        'b' => 8
                                                    ),
                                    'access_token' => bin2hex(random_bytes(10))
                                ]);
    }

    //Summary - Page 1
    public function list_summary()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //Jobs - page 1
    public function list_jobs()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //Payment Statements List - page 4
    public function payment_tatements()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
