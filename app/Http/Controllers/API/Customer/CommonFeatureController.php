<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class CommonFeatureController extends Controller
{
	//showing the links to app
    public function link_to_app()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //reporting an issue with the job
    public function reporting_issue_with_job()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //reporting an issue with the job
    public function training_videos()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //reporting an issue with the job
    public function how_can_we_help()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //reporting an issue with the job
    public function inviting_friends()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
