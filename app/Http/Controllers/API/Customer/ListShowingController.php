<?php
namespace App\Http\Controllers\API\Customer;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\API\APIAuth;

use Request;
use Validator;
use Auth;
use Carbon\Carbon;
use DB;

class ListShowingController extends APIAuth
{
    //Summary - Page 1
    public function list_summary()
    {
        $postData       = Request::all();

        $no_of_day_to_show  =   7;
        $data_per_page      =   10;
        $current_page_no    =   1;

        if(isset($postData['no_of_day_to_show']) && strlen($postData['no_of_day_to_show']))
            $no_of_day_to_show = $postData['no_of_day_to_show'];
        if(isset($postData['data_per_page']) && strlen($postData['data_per_page']))
            $data_per_page = $postData['data_per_page'];
        if(isset($postData['current_page_no']) && strlen($postData['current_page_no']))
            $current_page_no = $postData['current_page_no'];

        $summary = DB::table('service_rating')
                    ->join('partners', 'partners.id',   '=', 'service_rating.partner_id')
                    ->join('users',     'users.id',     '=', 'partners.user_id')
                    ->select(
                                DB::raw("CONCAT( users.first_name,' ', users.last_name) as lawn_pro"),
                                DB::raw ('AVG(service_rating.rating)                    as rating'),
                                DB::raw ('COUNT(service_rating.rating)                  as jobs'),
                                DB::raw ('SUM(service_rating.rating)                    as payout')
                            )
                    ->where('customer_id', '=', Auth::user()->id)
                    ->whereRaw('service_rating.created_at >= DATE(NOW()) - INTERVAL '.$no_of_day_to_show.' DAY')
                    ->groupBy('service_rating.partner_id')
                    ->orderBy('lawn_pro', 'asc');

        $total_no_of_data  =   $summary->count();

    	return response()->json(
                                [
                                    'no_of_day_to_show'     => $no_of_day_to_show,
                                    'data_per_page'         => $data_per_page,
                                    'current_page_no'       => $current_page_no,
                                    'all_data'              => $summary->get(),
                                    'total_no_of_data'      => $total_no_of_data
                                ]
                            );
    }

    //Jobs - page 1
    public function list_jobs()
    {
    	return response()->json(
								[
									//array of data
								]
							);
    }

    //Payment Statements List - page 4
    public function payment_statements()
    {
    	return response()->json(
								[
									//array of data
								]
							);
    }
}
