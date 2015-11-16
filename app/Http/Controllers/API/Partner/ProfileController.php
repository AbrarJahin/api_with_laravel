<?php
namespace App\Http\Controllers\API\Partner;

use App\Http\Controllers\API\APIAuth;

use Request;
use Auth;
use DB;
use App\Partner;
use App\User;
use App\Upload;
use Validator;

class ProfileController extends APIAuth
{
	//showing the profile
    public function profile_view()
    {
    	$partner = Partner::find(Auth::user()->id);
    	$user = User::find($partner->user_id);     //can be done straight forword, it is done in this way because of security
    	return response()->json(
								[
									'first_name'       => $user->first_name,
                                    'last_name'   	   => $user->last_name,
                                    'business_type'    => $partner->business_type,
                                    'company_name'     => $partner->company_name,
                                    'type_of_phone'    => $partner->type_of_phone,
                                    'is_18_years_old'  => $partner->is_18_years_old,
                                    'uploaded_files'   => Upload::where('user_id', '=', $partner->user_id)->get(),
								]
							);
    }

    //updating the profile
    public function profile_update()
    {
    	$postData 	= Request::all();
    	$message 	= array("Updated Successfully");
    	$partner 	= Partner::find(Auth::user()->id);
    	$user 		= User::find($partner->user_id);

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
    	if (isset($postData['business_type']))
        {
            $validator = Validator::make($postData,
                            [
                                'business_type'         => 'required|in:"Single Person Business","Multiple Person Business"'
                            ]);

            if ($validator->fails())
                array_push($message,"'business_type' value can only be 'Single Person Business' or 'Multiple Person Business', so 'business_type' not updated");
            else
                $partner->business_type = $postData['business_type'];
        }
        if (isset($postData['company_name']))
        {
            if(strlen($postData['company_name']))
                $partner->company_name = $postData['company_name'];
        }
        if (isset($postData['type_of_phone']))
        {
            $validator = Validator::make($postData,
                            [
                                'type_of_phone'         => 'required|in:"Android","iOS","Other"'
                            ]);

            if ($validator->fails())
                array_push($message,"'type_of_phone' value can only be 'Android', 'iOS' or 'Other', so 'type_of_phone' not updated");
            else
                $partner->type_of_phone = $postData['type_of_phone'];
        }
        if (isset($postData['is_18_years_old']))
        {
            $validator = Validator::make($postData,
                            [
                                'is_18_years_old'         => 'required|in:"yes","no"'
                            ]);

            if ($validator->fails())
                array_push($message,"'is_18_years_old' value can only be 'yes' or 'no', so 'is_18_years_old' not updated");
            else
                $partner->is_18_years_old = $postData['is_18_years_old'];
        }

		//Saving the update
		$partner->save();
		$user->save();

    	return response()->json(
								[
                                    'message'    	=> $message
								]
							);
    }
}
