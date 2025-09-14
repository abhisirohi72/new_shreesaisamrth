<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdminBankDetail;
use Illuminate\Http\Request;
use App\Models\Crypto;
use App\Models\DepositFund;
use App\Models\TransactionHistory;
use App\Models\TransferHistory;
use App\Models\User;
use App\Models\UserFundTransfer;
use Illuminate\Support\Facades\Auth;

class DepositFundController extends Controller
{
    public function __construct()
    {
        
    }

    public function depositFund(Request $request){
        $title = "Add Deposit Fund";
        // $details= Investment::all();
        return view("user.deposit_fund.add", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function viewDepositFund(Request $request){
        $title = "View Deposit Fund";
        $details= DepositFund::where("user_id", Auth::id())->get();
        return view("user.deposit_fund.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function fundTransfer(Request $request){
        $title = "Fund Transfer";
        // $details= DepositFund::where("user_id", Auth::id())->get();
        return view("user.transfer_fund.add", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function getCryptoDetials(Request $request){
        $send_value = $request->input("send_value");
        $details= AdminBankDetail::where("id", 1)->first();
        if ($send_value=="usdt") {
            //get admkin details
            $admin_details = User::where("user_type", 1)->first();
            $details= Crypto::where("user_id", $admin_details->id)->first();
        }
        return response()->json($details);
    }

    public function addDepositFund(Request $request){
        return $this->addUpdateDepositFund($request);
    }

    public function addUpdateDepositFund($request){
        $request->validate([
            "payment_mode"  =>  "required",
            "amount"        =>  "required",
            "remark"        =>  "required",
            "screenshot"    =>  "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $screenshot = "";
            if ($request->hasFile('screenshot')) {
                $file = $request->file("screenshot");
                $screenshot = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/deposit_funds', $screenshot, 'public'); // Save file to storage
            }

            $insert_array = [
                "user_id"       =>  Auth::id(),
                "payment_mode"  =>  $request->input("payment_mode"),
                "amount"        =>  $request->input("amount"),
                "remark"        =>  $request->input("remark"),
                "screenshot"    =>  $screenshot,
                "status"        =>  "2"
            ];
            
            $insert= DepositFund::create($insert_array);
            if($insert){
                return back()->with("success", "Data insert successfully...");
            }else{
                return back()->with("error", "There is some issue on inserting...");
            }
        }catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function getUserDetails(Request $request){
        $request->validate([
            "user_email"    =>  "required"
        ]);
        $details= User::where("email", $request->input("user_email"))
                        ->orWhere("unique_id", $request->input("user_email"))->first();
        return response()->json($details);
    }

    public function userFundTransfer(Request $request){
        $request->validate([
            "email"     =>  "required",
            "amount"    =>  "required"
        ]);

        try {
            //check user amount is exist or not
            if ($request->input('amount')<= Auth::user()->wallet) {
                $insert = UserFundTransfer::create([
                    "user_email"        =>  Auth::user()->email,
                    "transfer_email"    =>  $request->input("email"),
                    "amount"            =>  $request->input("amount")
                ]);

                if($insert){
                    $old_wallet = Auth::user()->wallet;
                    $new_wallet = ($old_wallet-$request->input("amount"));
                    //user wallet update
                    $wallet_update = User::where("id", Auth::id())->update([
                        "wallet"    =>  $new_wallet
                    ]);

                    //update to transfer user wallet
                    $transfer_u_details = User::where("email", $request->input("email"))->first();
                    $old_transfer_u_wallet= $transfer_u_details->wallet;
                    $new_trans_u_wallet = ($old_transfer_u_wallet+$request->input("amount"));

                    $transfer_u_update = User::where("email", $request->input("email"))->update([
                        "wallet"    =>  $new_trans_u_wallet
                    ]);

                    TransactionHistory::create([
                        "user_id"           =>  Auth::id(),
                        "previous_wallet"   =>  $old_wallet,
                        "current_wallet"    =>  $new_wallet,
                        "reason"            =>  "Fund transfer To this user ".$request->input("email")
                    ]);

                    TransactionHistory::create([
                        "user_id"           =>  $transfer_u_details->id,
                        "previous_wallet"   =>  $old_transfer_u_wallet,
                        "current_wallet"    =>  $new_trans_u_wallet,
                        "reason"            =>  "Fund recieve To this user ".Auth::user()->email
                    ]);

                    return back()->with("success", "Records has been successfully created");
                }else{
                    return back()->with("error", "There is some issue in inserting");
                }
            }else{
                return back()->with("error", "Insufficient wallet balance");
            }
        }catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function fundHistory(Request $request){
        $title = "TopUp History";
        $details= TransactionHistory::where("user_id", Auth::id())
                    ->orderBy("id", "desc")
                    ->get();
        return view("user.topup.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }
}
