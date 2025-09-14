<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserPackagePurchase;
use Illuminate\Http\Request;

class PayoutController extends Controller
{
    public function sendDistribution(Request $request){
        $start_date = date("Y-m-d 00:00:00");
        $end_date   = date("Y-m-d 23:59:59");
        $user_pckg_purchase = UserPackagePurchase::with("investments")->whereBetween("next_date", [$start_date, $end_date])->get();
        echo "<pre>";
        print_r($user_pckg_purchase);
        exit;
        foreach ($user_pckg_purchase as $key => $value) {
            //get package details
            
        }
    }
}
