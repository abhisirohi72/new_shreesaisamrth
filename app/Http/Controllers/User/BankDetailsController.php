<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\ProfessionalDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Marketing;
use App\Models\BankDetail;

class BankDetailsController extends Controller
{
    public function __construct()
    {
        
    }

    public function addBankDetails(Request $request) : View{
        $title = "Add Bank Details";
        // echo "enter";
        $details= BankDetail::where("user_id", Auth::id())->first();
        // echo "<pre>";
        // print_r($details);
        // exit;
        // echo $details->holder_name; exit;
        return view("bank_details.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveBankDetails(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "holder_name"  =>  "required",
                "bank_name"  =>  "required",
                "account_number"  =>  "required",
                "ifsc"  =>  "required",
            ]);

            $isExist = BankDetail::where("id", Auth::id())->exists();
            // echo "<pre>";
            // print_r($isExist);
            // echo empty($isExist);
            if($isExist){
                return back()->with("error", "Please Contact Admin...");
                $update = BankDetail::where("id", Auth::id())->update([
                    "user_id"               =>  Auth::id(),
                    "holder_name"    =>  $request->input("holder_name"),
                    "bank_name"      =>  $request->input("bank_name"),
                    "account_number"          =>  $request->input("account_number"),
                    "ifsc"          =>  $request->input("ifsc"),
                    "google_pe"          =>  $request->input("google_pe"),
                    "phonepe"          =>  $request->input("phonepe"),
                    "paytm"          =>  $request->input("paytm"),
                    "updated_at"            =>  date("Y-m-d H:i:s")
                ]);
                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            }else{
                // echo "else"; exit;
                $create = BankDetail::create([
                    "user_id"               =>  Auth::id(),
                    "holder_name"    =>  $request->input("holder_name"),
                    "bank_name"      =>  $request->input("bank_name"),
                    "account_number"          =>  $request->input("account_number"),
                    "ifsc"          =>  $request->input("ifsc"),
                    "google_pe"          =>  $request->input("google_pe"),
                    "phonepe"          =>  $request->input("phonepe"),
                    "paytm"          =>  $request->input("paytm"),
                ]);

                if ($create) {
                    return back()->with("success", "Successfully Inserted!!!");
                }
            }
            // exit("bahar");
            return back()->with("error", "There is some issue in inserted or updated");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }
}
