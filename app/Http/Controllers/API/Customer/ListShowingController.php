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
    private function find_min($var_1,$var_2)
    {
        if($var_1>$var_2)
            return $var_2;
        else
            return $var_1;
    }

    //Summary - Page 1
    public function list_summary()
    {
        $postData       = Request::all();

        $no_of_day_to_show  =   7;
        $data_per_page      =   10;
        $current_page_no    =   1;

        //If any data is received, then remove the default data
        if(isset($postData['no_of_day_to_show']) && strlen($postData['no_of_day_to_show']))
            $no_of_day_to_show = $postData['no_of_day_to_show'];
        if(isset($postData['data_per_page']) && strlen($postData['data_per_page']))
            $data_per_page = $postData['data_per_page'];
        if(isset($postData['current_page_no']) && strlen($postData['current_page_no']))
            $current_page_no = $postData['current_page_no'];

        $summary = DB::table('service_rating')
                    ->join('partners',                  'partners.id',                          '=', 'service_rating.partner_id')
                    ->join('users',                     'users.id',                             '=', 'partners.user_id')
                    ->join('partner_service_scheduling','partner_service_scheduling.id',        '=', 'service_rating.pss_id')
                    ->join('scheduled_service',         'scheduled_service.id',                 '=', 'partner_service_scheduling.scheduled_service_id')
                    ->select(
                                DB::raw ("CONCAT( users.first_name,' ', users.last_name) as lawn_pro"),
                                DB::raw ('AVG(service_rating.rating)                    as rating'),
                                DB::raw ('COUNT(service_rating.rating)                  as jobs'),
                                DB::raw ('SUM(scheduled_service.payable_money)          as payout')
                            )
                    ->where('service_rating.customer_id', '=', Auth::user()->id)
                    ->whereRaw('service_rating.created_at >= DATE(NOW()) - INTERVAL '.$no_of_day_to_show.' DAY')
                    ->groupBy('service_rating.partner_id')
                    ->orderBy('users.first_name', 'asc');

        $total_no_of_data  =   $summary->count();

    	return response()->json(
                                [
                                    'no_of_day_to_show'     => $no_of_day_to_show,
                                    'data_per_page'         => $data_per_page,
                                    'data'                  => $summary->skip(($current_page_no-1)*$data_per_page)->take($data_per_page)->get(),
                                    'current_page_no'       => $current_page_no,
                                    'total_page_no'         => $total_no_of_data/$data_per_page,
                                    'showing_start'         => $this->find_min($total_no_of_data,($current_page_no-1)*$data_per_page+1),
                                    'showing_end'           => $this->find_min($total_no_of_data,$current_page_no*$data_per_page),
                                    'total_no_of_data'      => $total_no_of_data
                                ]
                            );
    }

    //Jobs - page 1
    public function list_jobs()
    {
    	$postData       = Request::all();

        $no_of_day_to_show  =   7;
        $data_per_page      =   10;
        $current_page_no    =   1;

        //If any data is received, then remove the default data
        if(isset($postData['no_of_day_to_show']) && strlen($postData['no_of_day_to_show']))
            $no_of_day_to_show = $postData['no_of_day_to_show'];
        if(isset($postData['data_per_page']) && strlen($postData['data_per_page']))
            $data_per_page = $postData['data_per_page'];
        if(isset($postData['current_page_no']) && strlen($postData['current_page_no']))
            $current_page_no = $postData['current_page_no'];

        $jobs = DB::table('service_rating')
                    ->join('partners',                  'partners.id',                          '=', 'service_rating.partner_id')
                    ->join('users',                     'users.id',                             '=', 'partners.user_id')
                    ->join('partner_service_scheduling','partner_service_scheduling.id',        '=', 'service_rating.pss_id')
                    ->join('scheduled_service',         'scheduled_service.id',                 '=', 'partner_service_scheduling.scheduled_service_id')
                    ->select(
                                DB::raw ("CONCAT( users.first_name,' ', users.last_name)            as finished_by"),
                                DB::raw ("DATE_FORMAT(scheduled_service.created_at, '%D %M, %Y')    as date"),
                                DB::raw ("DATE_FORMAT(scheduled_service.created_at, '%r')           as time_started"),
                                DB::raw ("DATE_FORMAT(scheduled_service.updated_at, '%r')           as time_completed"),
                                //DB::raw ("DATE_FORMAT(service_rating.created_at, '%r')              as time_completed"),
                                DB::raw ('SUM(scheduled_service.payable_money)                      as pay'),
                                DB::raw ('SUM(scheduled_service.is_done)                            as status')
                            )
                    ->where('service_rating.customer_id', '=', Auth::user()->id)
                    ->whereRaw('service_rating.created_at >= DATE(NOW()) - INTERVAL '.$no_of_day_to_show.' DAY')
                    ->groupBy('service_rating.partner_id')
                    ->orderBy('users.first_name', 'asc');

        $total_no_of_data  =   $jobs->count();

        return response()->json(
                                [
                                    'no_of_day_to_show'     => $no_of_day_to_show,
                                    'data_per_page'         => $data_per_page,
                                    'data'                  => $jobs->skip(($current_page_no-1)*$data_per_page)->take($data_per_page)->get(),
                                    'current_page_no'       => $current_page_no,
                                    'total_page_no'         => $total_no_of_data/$data_per_page,
                                    'showing_start'         => $this->find_min($total_no_of_data,($current_page_no-1)*$data_per_page+1),
                                    'showing_end'           => $this->find_min($total_no_of_data,$current_page_no*$data_per_page),
                                    'total_no_of_data'      => $total_no_of_data
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
