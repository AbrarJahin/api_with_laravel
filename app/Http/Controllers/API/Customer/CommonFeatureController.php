<?php
namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers;

class CommonFeatureController extends Controller
{
	//showing the links to app
    public function link_to_app()
    {
    	return response()->json(
                                [
                                    'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
                                ]
                            );
    }

    //reporting an issue with the job
    public function reporting_issue_with_job()
    {
    	return response()->json(
                                [
                                    'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
                                ]
                            );
    }

    //reporting an issue with the job
    public function training_videos()
    {
    	return response()->json(
                                [
                                    'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
                                ]
                            );
    }

    //reporting an issue with the job
    public function how_can_we_help()
    {
    	return response()->json(
                                [
                                    'name'         => Auth::user()->first_name." ".Auth::user()->last_name,
                                    'login_name'   => Auth::user()->login_name,
                                    'user_type'    => Auth::user()->user_type
                                ]
                            );
    }

    //reporting an issue with the job
    public function inviting_friends()
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
