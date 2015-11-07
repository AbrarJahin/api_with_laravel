<?php
namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	//showing the profile
    public function profile_view()
    {
    	return response()->json(
								[
									'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
								]
							);
    }

    //updating the profile
    public function profile_update()
    {
    	return response()->json(
								[
									'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
								]
							);
    }
}
