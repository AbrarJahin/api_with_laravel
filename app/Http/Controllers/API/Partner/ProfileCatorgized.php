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
            echo $location;
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
}
