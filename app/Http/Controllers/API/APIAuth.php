<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class APIAuth extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }
}
