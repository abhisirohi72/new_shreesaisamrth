<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PackageDistribution;
use App\Models\TeamLevel;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPackagePurchase;
use Illuminate\Support\Carbon;
use App\Models\PackagePurchaseHistory;

class CronController extends Controller
{
    public function __construct()
    {
        
    }

    public function monthlyWisePackageDistribution(Request $request){
        $today_list = UserPackagePurchase::with("investment")->whereDate("next_date", Carbon::today())->get();
        // echo "<pre>";
        // print_r($today_list);
        // exit;
        foreach ($today_list as $key => $value) {
            //check team level distribution
            $total_level =  TeamLevel::where("id", 1)->value("team_level");
            $user_id= $value->user_id;
            for ($counter=1; $counter <= $total_level; $counter++) { 
                echo "----------------mainuser=".$user_id;
                // if($counter==2) exit;
                $fetch_sponsor = $this->getSponsor($user_id);
                $start_limit = $counter-1;
                $monthly_distribution = PackageDistribution::where("package_id", $value->package_id)
                                                ->skip($start_limit)
                                                ->take(1)
                                                ->pluck("monthly")
                                                ->first();
                echo "<br>mnthly=".$monthly_distribution; //exit;
                if($value->investment->amount){
                    echo "<br>pkg_amnt=".$pkg_amnt= ($value->investment->amount*$monthly_distribution/100);
                    if ($counter==1) {
                        $current_user_prev_wallet   =   User::where("id", $user_id)->value("wallet");
                        $new_current_user_wallet    =   ($current_user_prev_wallet+$pkg_amnt);
                        //update current user wallet
                        $current_user_update= User::where("id", $user_id)->update([
                            "wallet"    =>  $new_current_user_wallet
                        ]);

                        if ($current_user_update) {
                            TransactionHistory::create([
                                "user_id"           =>  $user_id,
                                "previous_wallet"   =>  $current_user_prev_wallet,
                                "current_wallet"    =>  $new_current_user_wallet,
                                "reason"            =>  "Level 1 Distribution Investment id=".$value->investment->id
                            ]);
                            $new_total= ($value->total+1);
                            UserPackagePurchase::where("id", $value->id)->update([
                                "total" =>  $new_total
                            ]);

                            PackagePurchaseHistory::create([
                                "user_id"       =>  $user_id,
                                "investment_id" =>  $value->investment->id,
                                "amount"        =>  $pkg_amnt,
                                "level"         =>  $counter,
                            ]);
                        }

                        //update sponsor walllet also only for first time cond
                        $sponsor_prev_wallet        =   User::where("id", $fetch_sponsor)->value("wallet");
                        $new_current_sponsor_wallet =   ($sponsor_prev_wallet+$pkg_amnt);
                        $current_sponsor= User::where("id", $fetch_sponsor)->update([
                            "wallet"    =>  $new_current_sponsor_wallet
                        ]);
                        if ($current_sponsor) {
                            TransactionHistory::create([
                                "user_id"           =>  $fetch_sponsor,
                                "previous_wallet"   =>  $sponsor_prev_wallet,
                                "current_wallet"    =>  $new_current_sponsor_wallet,
                                "reason"            =>  "Level 1 Distribution Investment id=".$value->investment->id
                            ]);

                            PackagePurchaseHistory::create([
                                "user_id"       =>  $fetch_sponsor,
                                "investment_id" =>  $value->investment->id,
                                "amount"        =>  $pkg_amnt,
                                "level"         =>  $counter,
                            ]);
                        }
                        echo "<br>if_userId=".$user_id = $fetch_sponsor;

                    }else{
                        //firstly check direct user is exist or not
                        $isDirectExist = User::where("sponsor_id", $user_id)->count();
                        if ($isDirectExist >= $counter) {
                            $user_prev_wallet = User::where("id", $user_id)->value("wallet");
                            $new_user_wallet    =   ($user_prev_wallet+$pkg_amnt);
                            //update user wallet
                            $current_sponsor = User::where("id", $user_id)->update([
                                "wallet"    =>  $new_user_wallet
                            ]);

                            if ($current_sponsor) {
                                TransactionHistory::create([
                                    "user_id"           =>  $user_id,
                                    "previous_wallet"   =>  $user_prev_wallet,
                                    "current_wallet"    =>  $new_user_wallet,
                                    "reason"            =>  "Level ".$counter." Distribution Investment id=".$value->investment->id
                                ]);

                                PackagePurchaseHistory::create([
                                    "user_id"       =>  $user_id,
                                    "investment_id" =>  $value->investment->id,
                                    "amount"        =>  $pkg_amnt,
                                    "level"         =>  $counter,
                                ]);
                            }
                        }
                        //get the sponsor
                        $get_sponsor= User::where("id", $user_id)->value("sponsor_id");
                        echo "<br>if_userId=".$user_id = $get_sponsor;
                    }
                }
            }
        }
        // $package_details = UserPackagePurchase::
    }

    private function getSponsor($user_id){
        return User::where("id", $user_id)->value("sponsor_id");
    }
}
