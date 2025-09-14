<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddUsdt;
use App\Models\AdminAddFund;
use Illuminate\Http\Request;
use App\Models\DepositFund;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DepositFundController extends Controller
{
    public function __construct()
    {
        
    }

    public function viewDepositFund(Request $request){
        $title = "View Deposit Fund";
        $details= DepositFund::with('user')->get();
        $usdt_details = AddUsdt::where("id", 1)->first();
        return view("admin.deposit_fund.view",[
            "title"         =>  $title,
            "details"       =>  $details,
            "usdt_details"  =>  $usdt_details
        ]);
    }

    public function adminFundAdd(Request $request){
        $title = "Add Fund";
        $details= AdminAddFund::with("users")->orderBy("created_at", "desc")->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("admin.fund.add",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function depositFundChangeStatus(Request $request, $fund_id, $status){
        if($status==1){
            $deposit_fund_details = DepositFund::where("id", $fund_id)->first();
            //get user Wallet
            $user_wallet = User::where("id", $deposit_fund_details->user_id)->first();
            $previous_wallet = $user_wallet->wallet;
            if ($deposit_fund_details->payment_mode=="usdt") {
                //get usdt value
                $get_usdt_value = AddUsdt::where("id", 1)->first();
                $new_usdt_val=0;
                $reason = "";
                if($get_usdt_value){
                    $new_usdt_val= ($get_usdt_value->usdt_value*$deposit_fund_details->amount);
                    $reason .= $get_usdt_value->usdt_value;
                }else{
                    $new_usdt_val = $deposit_fund_details->amount;
                }
                $new_wallet = ($new_usdt_val+$user_wallet->wallet);
                $reason = "Deposit fund by usdt, usdt value= ".$reason;
            }else{
                $new_wallet = ($deposit_fund_details->amount+$user_wallet->wallet);
                $reason = "Deposit fund by INR";
            }
        }
        $update = DepositFund::where("id", $fund_id)->update([
            "status"    =>  $status
        ]);
        // echo $new_wallet;
        // exit;

        if($update){
            if($status==1){
                //update user wallet
                $update_user= User::where("id", $deposit_fund_details->user_id)->update([
                    "wallet"    =>  $new_wallet
                ]);

                if ($update_user) {
                    TransactionHistory::create([
                        "user_id"           =>  $deposit_fund_details->user_id,
                        "previous_wallet"   =>  $previous_wallet,
                        "current_wallet"    =>  $new_wallet,
                        "reason"            =>  $reason
                    ]);
                }
            }
            return back()->with("success", "Records has been updated!!!");
        }else{
            return back()->with("error", "There is some issue on updating!!!");
        }
    }

    public function saveUsdt(Request $request){
        $request->validate([
            "usdt_value" => "required"
        ]);

        try {
            $details= AddUsdt::where("id", 1)->first();
            if ($details) {
                $update = AddUsdt::where("id", 1)->update([
                    "usdt_value"    =>  $request->input("usdt_value")
                ]);

                if ($update) {
                    return back()->with("success", "Records has been successfully updated...");
                }else {
                    return back()->with("error", "There is some issue on updating...");
                }
            }else{
                $insert = AddUsdt::create([
                    "usdt_value"    =>  $request->input("usdt_value")
                ]);

                if ($insert) {
                    return back()->with("success", "Records has been successfully inserted...");
                }else{
                    return back()->with("error", "There is some issue on inserting...");
                }
            }
        }catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function getUserName(Request $request){
        $details = User::where("email", $request->input("user_email"))->orWhere("unique_id", $request->input("user_email"))->first();
        if ($details) {
            return response()->json(["name" => $details->name]);
        }
    }

    public function saveAdminAddFund(Request $request){
        $request->validate([
            "add_email" =>  "required",
            "add_fund"  =>  "required"
        ]);
        try {
            $user_wallet = User::where("email", $request->input("add_email"))->orWhere("unique_id", $request->input("add_email"))->first();
            $insert = AdminAddFund::create([
                "user_email"    =>  $user_wallet->email,
                "amount"        =>  $request->input("add_fund")
            ]);

            if ($insert) {
                
                $new_wallet = $user_wallet->wallet+$request->input("add_fund");

                $update_on_user  = User::where("email", $request->input("add_email"))->orWhere("unique_id", $request->input("add_email"))->update([
                    "wallet"    =>  $new_wallet
                ]);

                if($update_on_user){
                    TransactionHistory::create([
                        "user_id"           =>  $user_wallet->id,
                        "previous_wallet"   =>  $user_wallet->wallet,
                        "current_wallet"    =>  $new_wallet,
                        "reason"            =>  "Admin add desposit fund"    
                    ]); 
                }
                return back()->with("success", "Records has been successfully inserted!!!");
            }else{
                return back()->with("error", "There is some issue in inserted!!!");
            }
        }catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }
}
