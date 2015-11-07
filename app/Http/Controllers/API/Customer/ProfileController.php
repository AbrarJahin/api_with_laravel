<?php
namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\API\APIAuth;

use Request;
use Auth;
use DB;
use App\Customer;
use App\User;
use Validator;

class ProfileController extends APIAuth
{
	//showing the profile
    public function profile_view()
    {
    	$customer = Customer::find(Auth::user()->id);
    	$user = User::find($customer->user_id);
    	return response()->json(
								[
									'first_name'    => $user->first_name,
                                    'last_name'   	=> $user->last_name,
                                    'neighbourhood' => $customer->neighbourhood,
                                    'email'    		=> $customer->email
								]
							);
    }

    //updating the profile
    public function profile_update()
    {
    	$postData 	= Request::all();
    	$message 	= "Updated Successfully";
    	$customer 	= Customer::find(Auth::user()->id);
    	$user 		= User::find($customer->user_id);

    	//Update Operations
    	if (isset($postData['first_name']))
    	{
    		if(strlen($postData['first_name']))
    			$user->first_name = $postData['first_name'];
    	}
    	if (isset($postData['last_name']))
    	{
    		if(strlen($postData['last_name']))
    			$user->last_name = $postData['last_name'];
    	}
    	if (isset($postData['neighbourhood']))
    	{
    		if(strlen($postData['neighbourhood']))
    			$customer->neighbourhood = $postData['neighbourhood'];
    	}
    	if (isset($postData['email']))
    	{
    		if(strlen($postData['email']))
    		{
    			$validator = Validator::make($postData,
    			                [
    			                    'email'         => 'required|email'
    			                ]);

    			if ($validator->fails())
    			{
    				$message = 'Wrong email, others updated';
    			}
    			else
    				$customer->email = $postData['email'];
    		}
    	}

		//Saving the update
		$customer->save();
		$user->save();

    	return response()->json(
								[
									'first_name'    => $user->first_name,
                                    'last_name'   	=> $user->last_name,
                                    'neighbourhood' => $customer->neighbourhood,
                                    'email'    		=> $customer->email,
                                    'message'    	=> $message
								]
							);
    }
}
