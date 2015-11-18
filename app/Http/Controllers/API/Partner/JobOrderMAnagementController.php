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
use File;
use URL;

class JobOrderMAnagementController extends APIAuth
{
	//showing the profile
    public function open_work_orders_view()
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
}
