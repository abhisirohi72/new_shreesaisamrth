<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPackagePurchase;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\PackagePurchaseHistory;
use App\Models\PayoutDistribution;

class PayoutController extends Controller
{
    public function selfPayout(Request $request){
        $title  =   "Self Payout";
        return view("user.payout.self",[
            "title" =>  $title
        ]);
    }

    public function teamPayout(Request $request){
        $title  =   "Team Payout";
        return view("user.payout.team",[
            "title" =>  $title
        ]);
    }

    public function sendDistribution(Request $request){
        $start_date = date("Y-m-d 00:00:00");
        $end_date   = date("Y-m-d 23:59:59");
        $user_pckg_details = UserPackagePurchase::with(['investment', 'package_distributions'])->whereBetween("next_date",[$start_date, $end_date])->get();
        // $user_pckg_details = UserPackagePurchase::with(['investment', 'package_distributions'])->whereBetween("next_date",[$start_date, $end_date])->toSql();
        // dd($user_pckg_details);
        // echo "<pre>";
        // print_r($user_pckg_details);
        // exit;
        foreach ($user_pckg_details as $key => $detail) {
            $data= $this->distribution($detail->user_id, $detail->package_distributions, $detail->investment->amount, $detail->id, $detail->total, $detail->investment->id);
            // echo "<pre>";
            // print_r($data);
            // exit;
        }
        echo 1;
    }

    public function distributionUser(Request $request){
        $title  =   "Payout Distribution";
        $details = PayoutDistribution::all();
        return view("admin.payout.distribution",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    private function showDistribution($user_id, $level, $amnt, $usr_pckg_purchs_id, $usr_pckg_total, $invst_id){
        // echo count($level); exit;
        if (count($level) > 0) {
            // echo $user_id;
            // print_r($level);
            // echo $amnt;
            foreach ($level as $key => $value) {
                // echo "<br>".$user_id;
                $u_details = User::where("id", $user_id)->first();
                
                if($u_details){
                    $old_wallet = $u_details->wallet;
                    $calc_amnt= ($amnt*$value->monthly)/100;
                    $new_wallet = $old_wallet+$calc_amnt;

                    // $update = User::where("id", $user_id)->update([
                    //     "wallet"    =>  $new_wallet
                    // ]);

                    PayoutDistribution::create([
                        "user_id"           =>  $user_id,
                        "previous_wallet"   =>  $old_wallet,
                        "current_wallet"    =>  $new_wallet,
                        "reason"            =>  "Level ".($key+1)." Distribution Investment id=".$invst_id,
                        "invst_id"          =>  $invst_id,
                        "invest_amount"     =>  $calc_amnt,
                        "date"              =>  date("Y-m-d H:i:s")
                    ]);
                    $user_id = $u_details->sponsor_id;
                }
            }
        }
    }

    private function distribution($user_id, $level, $amnt, $usr_pckg_purchs_id, $usr_pckg_total, $invst_id){
        // echo count($level); exit;
        if (count($level) > 0) {
            // echo $user_id;
            // print_r($level);
            // echo $amnt;
            foreach ($level as $key => $value) {
                // echo "<br>".$user_id;
                $u_details = User::where("id", $user_id)->first();
                
                if($u_details){
                    $old_wallet = $u_details->wallet;
                    $calc_amnt= ($amnt*$value->monthly)/100;
                    $new_wallet = $old_wallet+$calc_amnt;

                    $update = User::where("id", $user_id)->update([
                        "wallet"    =>  $new_wallet
                    ]);

                    if ($update) {
                        if($key==0){
                            $update_user_pckg= UserPackagePurchase::where("id", $usr_pckg_purchs_id)->update([
                                "total" =>  $usr_pckg_total+1
                            ]);
                        }
                        TransactionHistory::create([
                            "user_id"           =>  $user_id,
                            "previous_wallet"   =>  $old_wallet,
                            "current_wallet"    =>  $new_wallet,
                            "reason"            =>  "Level ".($key+1)." Distribution Investment id=".$invst_id
                        ]);

                        PackagePurchaseHistory::create([
                            "user_id"       =>  $user_id,
                            "investment_id" =>  $invst_id,
                            "amount"        =>  $calc_amnt,
                            "level"         =>  ($key+1),
                        ]);
                        PayoutDistribution::create([
                            "user_id"           =>  $user_id,
                            "user_email"        =>  $u_details->email,
                            "user_unique_id"    =>  $u_details->unique_id,
                            "previous_wallet"   =>  $old_wallet,
                            "current_wallet"    =>  $new_wallet,
                            "reason"            =>  "Level ".($key+1)." Distribution Investment id=".$invst_id,
                            "invst_id"          =>  $invst_id,
                            "invest_amount"     =>  $calc_amnt,
                            "date"              =>  date("Y-m-d H:i:s")
                        ]);
                        $user_id = $u_details->sponsor_id;
                    }
                }
            }
        }
    }
}
