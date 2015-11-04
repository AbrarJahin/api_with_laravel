<?php
namespace App\Http\Controllers\API\Customer;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\API\APIAuth;

class ListShowingController extends APIAuth
{
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
    public function payment_statements()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
