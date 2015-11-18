<?php
namespace App\Http\Controllers\API\Partner;

use App\Http\Controllers\API\APIAuth;

use Request;
use Auth;
use DB;
use App\Partner;
use App\User;
use App\Upload;
use App\PartnerZipCode;
use Validator;
use File;
use URL;

class ProfileCatorgized extends APIAuth
{
	//showing availabble location (zip code areas) of the partner
    public function partner_location_view()
    {
    	$partner = Partner::find(Auth::user()->id);
        $partner_locations = DB::table('zip_codes')
                                ->join('zip_code-partner', 'zip_code-partner.zip_code', '=', 'zip_codes.zip_code')
                                ->select(
                                            'zip_codes.zip_code',
                                            'zip_codes.type',
                                            'zip_codes.primary_city',
                                            'zip_codes.acceptable_cities'
                                        )
                                ->where('zip_code-partner.partner_id', '=', $partner->id)
                                ->get();
        return response()->json(
                                [
                                    'partner_locations'       => $partner_locations,
                                ]
                            );
    	/*
        return response()->json(
								[
									'partner_locations'       => PartnerZipCode::where('partner_id', $partner->id)->get(),
								]
							);
        */
    }

    //inserting location (zip code areas) of the partner
    public function partner_location_insert()
    {
        $postData   = Request::all();
        $partner    = Partner::find(Auth::user()->id);
        $message    = "Inserted Successfully";

        $insertdata = array();
        foreach ($postData['zip_code'] as $location)
        {
            array_push($insertdata,array(
                                            'zip_code'=>$location,
                                            'partner_id'=>$partner->id
                                        )
                        );
        }

        try
        {
            PartnerZipCode::insert($insertdata);
        }
        catch (Illuminate\Database\QueryException $e)
        {
            $message    = "Insertion Failed";
        }

        return response()->json(
                                [
                                    'partner_locations'       => PartnerZipCode::where('partner_id', $partner->id)->get(),
                                    'message'                 => $message
                                ]
                            );
    }

    //Removing location (zip code areas) of the partner
    public function partner_location_remove()
    {
        $postData   = Request::all();
        $partner    = Partner::find(Auth::user()->id);
        $message = "";

        $partner_zip = PartnerZipCode::where('partner_id', $partner->id)
                            ->where('zip_code', $postData['zip_code']);

        if($partner_zip->count())
        {
            $status = $partner_zip->delete();
            $message = "Successfully Deleted";
        }
        else
            $message = "Not found to delete";

        return response()->json(
                                [
                                    //'partner_locations'       => PartnerZipCode::where('partner_id', $partner->id)->get(),
                                    'zip_code' => $postData['zip_code'],
                                    'message'  => $message
                                ]
                            );
    }

    //Add Partner Experties
    public function partner_experties_add()
    {
        $postData   = Request::all();
        $partner    = Partner::find(Auth::user()->id);
        $message    = "Inserted Successfully";

        $insertdata = array();
        foreach ($postData['experties'] as $location)
        {
            array_push($insertdata,array(
                                            'experties_name'    =>$location,
                                            'partner_id'        =>$partner->id
                                        )
                        );
        }

        $status=DB::table('partner_experties')->insert($insertdata);
        return response()->json(
                                [
                                    //'partner_locations'       => PartnerZipCode::where('partner_id', $partner->id)->get(),
                                    'data'      => $postData['experties'],
                                    'status'    => $status,
                                    'message'   => $message
                                ]
                            );
    }

    //view Partner Experties
    public function partner_experties_view()
    {
        $partner = Partner::find(Auth::user()->id);
        $partner_experties = DB::table('partner_experties')
                                ->select(
                                            'experties_name'
                                        )
                                ->where('partner_id', '=', $partner->id)
                                ->get();
        return response()->json(
                                [
                                    'partner_locations'       => $partner_experties,
                                ]
                            );
    }

    //remove Partner Experties
    public function partner_experties_remove()
    {
        $postData   = Request::all();
        $partner = Partner::find(Auth::user()->id);
        $status = DB::table('partner_experties')
                                ->where('partner_id', '=', $partner->id)
                                ->where('experties_name', '=', $postData['experties_name'])
                                ->delete();
        return response()->json(
                                [
                                    'data'      => $postData['experties_name'],
                                    'no_of_deleted_files' => $status
                                ]
                            );
    }

    //Partner Availiblity
    //Add
    public function partner_availiblity_add()
    {
        $postData   = Request::all();
        $partner = Partner::find(Auth::user()->id);

        $status = DB::table('partner_availablity')->insert(
                                                            [
                                                                'partner_id'    => $partner->id,
                                                                'day_id'        => $postData['day_id'],
                                                                'time_id'       => $postData['time_id'],
                                                            ]
                                                        );
        return response()->json(
                                [
                                    'data'   => array(
                                                        'day_id'        => $postData['day_id'],
                                                        'time_id'       => $postData['time_id'],
                                                    ),
                                    'status' => $status
                                ]
                            );
    }

    //View
    public function partner_availiblity_view()
    {
        $partner = Partner::find(Auth::user()->id);

        return DB::table('partner_availablity')
                                ->join('partners', 'partners.id', '=', 'partner_availablity.partner_id')
                                ->join('service_day', 'service_day.id', '=', 'partner_availablity.day_id')
                                ->join('service_time', 'service_time.id', '=', 'partner_availablity.time_id')
                                ->select('service_day.day_name', 'service_time.service_time_name')
                                ->where('partner_id', '=', $partner->id)
                                ->distinct()
                                ->get();
    }

    //Delete
    public function partner_availiblity_delete()
    {
        $postData   = Request::all();
        $partner = Partner::find(Auth::user()->id);

        $status = DB::table('partner_availablity')
                                ->where('partner_id', '=', $partner->id)
                                ->where('day_id', '=', $postData['day_id'])
                                ->where('time_id','=', $postData['time_id'])
                                ->delete();
        return response()->json(
                                [
                                    'data'   => array(
                                                        'day_id'        => $postData['day_id'],
                                                        'time_id'       => $postData['time_id'],
                                                    ),
                                    'status' => $status
                                ]
                            );
    }

    //Partner owned equipement
    //Add
    public function partner_owned_equipment_add()
    {
        $postData   = Request::all();
        $partner = Partner::find(Auth::user()->id);

        $status = DB::table('partner_owned_equepment')->insert(
                                                            [
                                                                'partner_id'        => $partner->id,
                                                                'owned_equipment'   => $postData['owned_equipment'],
                                                            ]
                                                        );
        return response()->json(
                                [
                                    'data'   => $postData['owned_equipment'],
                                    'status' => $status
                                ]
                            );
    }
    //View
    public function partner_owned_equipment_view()
    {
        $partner = Partner::find(Auth::user()->id);

        return DB::table('partner_owned_equepment')
                    ->select('owned_equipment')
                    ->where('partner_id',       '=', $partner->id)
                    ->get();
    }
    //delete
    public function partner_owned_equipment_delete()
    {
        $postData   = Request::all();
        $partner = Partner::find(Auth::user()->id);

        $status = DB::table('partner_owned_equepment')
                    ->where('partner_id',       '=', $partner->id)
                    ->where('owned_equipment',  '=', $postData['owned_equipment'])
                    ->delete();
        return response()->json(
                                [
                                    'data'   => $postData['owned_equipment'],
                                    'status' => $status
                                ]
                            );
    }
}
