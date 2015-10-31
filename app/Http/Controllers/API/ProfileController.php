<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	//showing the profile
    public function profile_show()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }

    //updating the profile
    public function profile_update()
    {
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
