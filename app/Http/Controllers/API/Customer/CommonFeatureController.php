<?php
namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\API\APIAuth;

use Request;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;

class CommonFeatureController extends APIAuth
{
	//showing the links to app
    public function link_to_app()
    {
    	return response()->json(
                                [
                                    'web_link'                  => "http://terra-app.com/",
                                    'app_android_customer_link' => "https://play.google.com/store/apps/developer?id=Terra&hl=en",
                                    'app_android_partner_link'  => "https://play.google.com/store/apps/developer?id=Terra&hl=en",
                                    'app_ios_customer_link'     => "https://itunes.apple.com/us/app/terra/id373793156?mt=8",
                                    'app_ios_partner_link'      => "https://itunes.apple.com/us/app/terra/id373793156?mt=8"
                                ]
                            );
    }

    //reporting an issue with the job
    public function reporting_issue_with_job()
    {
        $postData                       = Request::all();

        //Validating the input
        $validator = Validator::make($postData,
                [
                    'scheduled_service_id'          => 'required',
                    'partner_service_scheduling_id' => 'required',
                    'report'                        => 'required',
                ]);

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all()//"'user_name' or 'password' is missing !"
                                ],411);
        }

        $scheduled_service_id           =   $postData['scheduled_service_id'];
        $partner_service_scheduling_id  =   $postData['partner_service_scheduling_id'];
        $report                         =   $postData['report'];

        //Now add the report in DB
        //Not done yet - need to be done

    	return response()->json(
                                [
                                    'message'      => "Report Added Successfully, out team is checking the issue",
                                ]
                            );
    }

    //reporting an issue with the job
    public function training_videos()
    {
    	return response()->json(
                                [
                                    'video_links'  => Auth::user()
                                ]
                            );
    }

    //reporting an issue with the job
    public function how_can_we_help()
    {
    	return response()->json(
                                [
                                    'message'         => 'Need to talk to Alex'
                                ]
                            );
    }

    //reporting an issue with the job
    public function inviting_friends()
    {
        $postData                       = Request::all();

        //Validating the input
        $validator = Validator::make($postData,
                [
                    'invitation_type'          => 'required',
                    'address'                  => 'required',
                    'message'                  => 'required',
                ]);

        if ($validator->fails())
        {
            return response(
                                [
                                    "message" => $validator->messages()->all()//"'user_name' or 'password' is missing !"
                                ],411);
        }

        $invitation_type    =   $postData['invitation_type'];
        $address            =   $postData['address'];
        $message            =   $postData['message'];

        //Now add the report in DB
        //Not done yet - need to be done

    	return response()->json(
                                [
                                    'message'         => 'Not done yet'
                                ]
                            );
    }
}
