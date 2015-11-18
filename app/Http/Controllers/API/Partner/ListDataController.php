<?php
namespace App\Http\Controllers\API\Partner;

use App\Http\Controllers\API\APIAuth;
use DB;

class ListDataController extends APIAuth
{
    public function service_time_list()
    {
        return DB::table('service_time')->get();
    }

    public function service_day_list()
    {
        return DB::table('service_day')->get();
    }
}
