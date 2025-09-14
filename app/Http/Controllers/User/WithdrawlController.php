<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AdminCharges;
use App\Models\UserWithdrawl;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Crypto;

class WithdrawlController extends Controller
{
    public function __construct()
    {
        
    }

    public function addUserWithdrawl(Request $request):View
    {
        $title = "Add Withdrawl";
        $details = AdminCharges::where("id", 1)->first();
        return view("user.withdrawl.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function showUserWithdrawl(Request $request):View
    {
        $title = "Show Withdrawl";
        $details = UserWithdrawl::where("user_id", Auth::id())->get();
        return view("user.withdrawl.show", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function userAddCrypto(Request $request){
        $title = "Add Crypto Details";
        $details= Crypto::where("user_id", Auth::id())->first();
        return view("user.withdrawl.crypto.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function deleteWithdrawl($id, Request $request){
        $delete = UserWithdrawl::where("id", $id)->delete();
        if($delete){
            return back()->with("success", "Deleted Data Successfully..."); 
        }else{
            return back()->with("error", "There is some issue on deleted..."); 
        }
    }

    public function saveUserWithdrawl(Request $request){
        $request->validate([
            "amount"    =>  "required",
            "details"   =>  "required"
        ]);

        //check walllet balance
         $get_tds= ($request->input("amount")*$request->input("tds")/100);
        $admin_charge = ($request->input("amount")*$request->input("amnt")/100);
        // exit;
        $deduct_amount=  $request->input("amount")-($admin_charge+$get_tds);
        // exit;
        $isValid = User::where("id", Auth::id())
                    ->where("wallet", ">=", $deduct_amount)
                    ->first();
        
        if($isValid){
            $insert = UserWithdrawl::create([
                "user_id"       =>  Auth::id(),
                "amount"        =>  $request->input("amount"),
                "admin_charge"  =>  $request->input("amnt"),
                "tds"           =>  $request->input("tds") ?? '0',
                "f_amount"      =>  $deduct_amount,
                "details"       =>  $request->input("details")
            ]);

            if($insert){
                return back()->with("success", "Inserted Data Successfully..."); 
            }else{
                return back()->with("error", "There is some issue on inserted..."); 
            }
        }else{
            return back()->with("error", "Wallet amount is not sufficient..."); 
        }
    }

    public function saveCrypto(Request $request){
        $validation_array = [
            "crypto_add"    =>  "required",
            "network"       =>  "required",
            "status"        =>  "required"
        ];
        
        //check admin charges already exiist or not
        $isExist = Crypto::where("user_id", Auth::id())->first();
        if($isExist){
            return back()->with("error", "Please Contact Admin...");
            // Handle file uploads
            $logo = "";
            if ($request->hasFile('logo')) {
                $file = $request->file("logo");
                $logo = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/crypto', $logo, 'public'); // Save file to storage
            }else{
                $logo = $isExist->logo;
            }

            $qr_code = "";
            if ($request->hasFile('qr_code')) {
                $file = $request->file("qr_code");
                $qr_code = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/crypto', $qr_code, 'public'); // Save file to storage
            }else{
                $qr_code = $isExist->qr_code;
            }

            $update = Crypto::where("user_id", Auth::id())->update([
                "user_id"       =>  Auth::id(),
                "logo"          =>  $logo,
                "qr_code"       =>  $qr_code,
                "crypto_add"    =>  $request->input("crypto_add"),
                "network"       =>  $request->input("network"),
                "status"        =>  $request->input("status"),
            ]);

            if($update){
                return back()->with("success", "Update Data Successfully..."); 
            }else{
                return back()->with("success", "There is some issue on updated..."); 
            }
        }else{
            $validation_array["logo"]= "required";
            $validation_array["qr_code"]= "required";

            $request->validate($validation_array);

            // Handle file uploads
            $logo = "";
            if ($request->hasFile('logo')) {
                $file = $request->file("logo");
                $logo = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/crypto', $logo, 'public'); // Save file to storage
            }

            $qr_code = "";
            if ($request->hasFile('qr_code')) {
                $file = $request->file("qr_code");
                $qr_code = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/crypto', $qr_code, 'public'); // Save file to storage
            }

            $insert = Crypto::create([
                "user_id"       =>  Auth::id(),
                "logo"          =>  $logo,
                "qr_code"       =>  $qr_code,
                "crypto_add"    =>  $request->input("crypto_add"),
                "network"       =>  $request->input("network"),
                "status"        =>  $request->input("status"),
            ]);
            if($insert){
                return back()->with("success", "Inserted Data Successfully..."); 
            }else{
                return back()->with("success", "There is some issue on inserted..."); 
            }
        }
    }
}
