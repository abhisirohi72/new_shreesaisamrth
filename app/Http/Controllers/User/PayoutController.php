<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPackagePurchase;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\PackagePurchaseHistory;
use App\Models\PayoutDistribution;
use Illuminate\Support\Facades\DB;
use App\Models\UserWithdrawl;
use Illuminate\Support\Facades\Auth;


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

    public function payoutWithdrawlList(Request $request){
        $title  =   "Withdrawl List";
        $details = UserWithdrawl::where("user_id", Auth::id())->get();
        return view("user.payout.withdrawl_list",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function payoutApprovalList(Request $request){
        $title  =   "Approval List";
        $details = UserWithdrawl::where("user_id", Auth::id())->where("status", "1")->get();
        return view("user.payout.withdrawl_list",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function payoutPendingList(Request $request){
        $title  =   "Pending List";
        $details = UserWithdrawl::where("user_id", Auth::id())->where("status", "0")->get();
        return view("user.payout.withdrawl_list",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function payoutRejectedList(Request $request){
        $title  =   "Rejected List";
        $details = UserWithdrawl::where("user_id", Auth::id())->where("status", "2")->get();
        return view("user.payout.withdrawl_list",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function sendDistribution(Request $request){
        $start_date = date("d");
        $current_month = date("m");
        // $end_date   = date("Y-m-d 23:59:59");
        // $user_pckg_details = UserPackagePurchase::with(['investment', 'package_distributions'])->whereRaw("DAY(next_date)=$start_date")
        // ->whereRaw("MONTH(next_date) < ?", [$current_month])
        // ->get();
        $user_pckg_details = UserPackagePurchase::with(['investment', 'package_distributions'])->whereRaw("DAY(next_date)=$start_date")
        ->whereRaw("MONTH(next_date) < ?", [$current_month])
        ->toSql();
        // echo $start_date."<br>";
        // echo $end_date;
        // dd($user_pckg_details);
        // echo "<pre>";
        // print_r($user_pckg_details);
        // exit;
        foreach ($user_pckg_details as $key => $detail) {
            if($detail->user_id==110){
                // echo $detail->user_id."###".$detail->package_distributions."###".$detail->investment->amount."###".$detail->id."###".$detail->total."###".$detail->investment->id."###".$detail->level_distribution."###".$detail->user_id;
                // echo "--------------------------------------------------------<br>";
                $data= $this->distribution($detail->user_id, $detail->package_distributions, $detail->investment->amount, $detail->id, $detail->total, $detail->investment->id, $detail->level_distribution, $detail->user_id);
                
            }
            // echo "<pre>";
            // print_r($data);
            // exit;
        }
        echo 1;
    }

    public function distributionUser(Request $request){
        $title  =   "Payout Distribution";
        $date = $request->query('date');
        if(!empty($date)){
            $date = date("Y-m-d", strtotime($date));
            $details = PayoutDistribution::whereDate("date", $date)->get();
        }else{  
            $details = PayoutDistribution::all();
        }
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

    private function distribution($user_id, $level, $amnt, $usr_pckg_purchs_id, $usr_pckg_total, $invst_id, $level_distribution, $main_user_id){
        // echo count($level); exit;
        if (count($level) > 0) {
            // print_r($level);
            // // exit;
            // echo $amnt;
            foreach ($level as $key => $value) {
                // echo "<br>userid=".$user_id;
                $u_details = User::where("id", $user_id)->first();
                if($u_details){
                    if(($usr_pckg_total <= 13) && ($key==0)){
                        $old_wallet = $u_details->wallet;
                        $calc_amnt=0;
                        $calc_amnt= (($amnt*$value->monthly)/100);
                        $new_wallet = $old_wallet+$calc_amnt;//exit;
                        
                        
                        $update = User::where("id", $user_id)->update([
                                    "wallet"    =>  $new_wallet
                                ]);

                        if ($update) {
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
                            if(($user_id==$main_user_id)){
                                $details = UserPackagePurchase::where("id",$usr_pckg_purchs_id)->first();

                                UserPackagePurchase::where("id",$usr_pckg_purchs_id)->update([
                                    "total" =>  $details->total+1
                                ]);
                            }
                        }
                        // print_r([
                        //             "wallet"    =>  $new_wallet
                        // ]);
                        // print_r([
                        //         "user_id"           =>  $user_id,
                        //         "previous_wallet"   =>  $old_wallet,
                        //         "current_wallet"    =>  $new_wallet,
                        //         "reason"            =>  "Level ".($key+1)." Distribution Investment id=".$invst_id
                        // ]);
                        // print_r([
                        //         "user_id"       =>  $user_id,
                        //         "investment_id" =>  $invst_id,
                        //         "amount"        =>  $calc_amnt,
                        //         "level"         =>  ($key+1),
                        // ]);
                        // print_r([
                        //         "user_id"           =>  $user_id,
                        //         "user_email"        =>  $u_details->email,
                        //         "user_unique_id"    =>  $u_details->unique_id,
                        //         "previous_wallet"   =>  $old_wallet,
                        //         "current_wallet"    =>  $new_wallet,
                        //         "reason"            =>  "Level ".($key+1)." Distribution Investment id=".$invst_id,
                        //         "invst_id"          =>  $invst_id,
                        //         "invest_amount"     =>  $calc_amnt,
                        //         "date"              =>  date("Y-m-d H:i:s")
                        // ]);
                        // exit;
                    }elseif ($level_distribution<=10) {
                        $old_wallet = $u_details->wallet;
                        $calc_amnt=0;
                        $calc_amnt= ($amnt*$value->monthly)/100;
                        $new_wallet = $old_wallet+$calc_amnt;
                        
                        $update = User::where("id", $user_id)->update([
                                    "wallet"    =>  $new_wallet
                                ]);

                        if ($update) {
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
                            $details = UserPackagePurchase::where("id",$usr_pckg_purchs_id)->first();
                            // echo "<pre>";
                            // print_r($details);
                            // echo "level=".($details->level_distribution+1);
                            UserPackagePurchase::where("id",$usr_pckg_purchs_id)->update([
                                "level_distribution" =>  ($details->level_distribution+1)
                            ]);
                            // echo "1=".$usr_pckg_purchs_id."2=".;
                        }
                    }
                }
                $user_id = $u_details->sponsor_id;
            }
        }
    }
}
