<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ListShowingController extends Controller
{
    public function add_votes()
    {
    	return view('welcome');
    	return Response::json(
								[
									//array of data
								]
							);
    }
}
