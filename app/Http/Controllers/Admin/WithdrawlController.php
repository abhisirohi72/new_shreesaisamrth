<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBankDetail;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Crypto;
use App\Models\AdminCharges;
use App\Models\BankDetail;
use App\Models\UserWithdrawl;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WithdrawlController extends Controller
{
    public function __construct()
    {
        
    }

    public function withdrawlSetting(Request $request): View
    {
        $title = "Add Withdrawl Settings";
        $details = AdminCharges::where("id", 1)->first();
        return view("admin.withdrawl.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function adminAddCrypto(Request $request){
        $title = "Add Crypto Details";
        $details= Crypto::where("user_id", Auth::id())->first();
        return view("admin.withdrawl.crypto.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function adminShowWithdrawl(Request $request){
        $title = "Show Withdrawl";
        $details = UserWithdrawl::with('user')->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("admin.withdrawl.show", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function adminWithdrawlChangeStatus($id, $status, Request $request){
        $change_status = UserWithdrawl::where("id", $id)->update([
            "status"    =>  $status
        ]);

        if($change_status){
            return back()->with("success", "Update Data Successfully..."); 
        }else{
            return back()->with("error", "There is some issue on updating..."); 
        }
    }

    public function saveWithdrawl(Request $request){
        // $request->validate([
        //     "admin_charges" =>  "required",
        //     "tds"           =>  "required"
        // ]);

        //check admin charges already exiist or not
        $isExist = AdminCharges::where("id", 1)->first();
        if($isExist){
            $update = AdminCharges::where("id", 1)->update([
                "admin_charges" => $request->input("admin_charges"),
                "tds" => $request->input("tds"),
            ]);

            if($update){
                return back()->with("success", "Update Data Successfully..."); 
            }else{
                return back()->with("success", "There is some issue on updated..."); 
            }
        }else{
            $insert = AdminCharges::create([
                "admin_charges" => $request->input("admin_charges"),
                "tds" => $request->input("tds"),
            ]);
            if($insert){
                return back()->with("success", "Inserted Data Successfully..."); 
            }else{
                return back()->with("success", "There is some issue on inserted..."); 
            }
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

    public function adminBankDetail(Request $request){
        $title = "Admin Bank Details";
        // echo session("admin")['id'];exit;
        $details = BankDetail::where("user_id", session("admin")['id'])->first();
        return view("admin.bank_details.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addAdminBankDetail(Request $request){
        $request->validate([
            "holder_name"         =>  "required",
            "bank_name"  =>  "required",
            "account_number"       =>  "required",
            "ifsc"              =>  "required",
            // "logo"              =>  "image|mimes:jpg,jpeg,png|max:2048",
        ]);

        try {
            $isExist = BankDetail::where("user_id", session("admin")['id'])->first();
            // $directory = "documents/admin_bank_details";
            // Storage::disk('public')->makeDirectory($directory);

            // $bank_logo = $isExist->logo ?? null;

            // if ($request->hasFile("logo") && $request->file('logo')->isValid()) {
            //     $file = $request->file('logo');
            //     $bank_logo = "logo_" . time() . "." . $file->extension();
            //     $logo_path = $file->storeAs($directory, $bank_logo, 'public');
            //     Log::info("Plan logo stored at: " . $logo_path);
            // }
            if ($isExist) {
                $update = BankDetail::where("id", 1)->update([
                    // "logo"              =>  $bank_logo,
                    "holder_name"       =>  $request->input("holder_name"),
                    "bank_name"         =>  $request->input("bank_name"),
                    "account_number"    =>  $request->input("account_number"),
                    "ifsc"              =>  $request->input("ifsc"),
                    "google_pe"         =>  $request->input("google_pe"),
                    "phonepe"           =>  $request->input("phonepe"),
                    "paytm"             =>  $request->input("paytm"),
                ]);

                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }else{
                    return back()->with("error", "There is some issue on updating");
                }
            }else{
                $insert = BankDetail::create([
                    // "logo"              =>  $bank_logo,
                    "holder_name"       =>  $request->input("holder_name"),
                    "bank_name"         =>  $request->input("bank_name"),
                    "account_number"    =>  $request->input("account_number"),
                    "ifsc"              =>  $request->input("ifsc"),
                    "google_pe"         =>  $request->input("google_pe"),
                    "phonepe"           =>  $request->input("phonepe"),
                    "paytm"             =>  $request->input("paytm"),
                ]);

                if ($insert) {
                    return back()->with("success", "Successfully Inserted!!!");
                }else{
                    return back()->with("error", "There is some issue on inserting");
                }
            }
        } catch(Exception $e){
            return back()->with("error", $e->getMessage());
        }
    }

    public function showUserAcnt(Request $request){
        $id = $request->input("id");
        $details= UserWithdrawl::where("id", $id)->first();
        if($details->details=="usdt"){
            $details = Crypto::where("user_id", $details->user_id)->where("status", "1")->first();
            $details->cond="usdt";
        }else{
            $details= BankDetail::where("user_id", $details->user_id)->first();
            $details->cond="bank";
        }

        return response()->json($details);
    }
}
