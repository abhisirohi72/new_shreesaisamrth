<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\FinancialDetail;
use Illuminate\Support\Facades\Auth;

class FinancialDetailsController extends Controller
{
    public function __construct()
    {
        
    }

    public function addFinancialDetails(Request $request) : View{
        $title = "Add Financial Details";

        $details= FinancialDetail::where("id", Auth::id())->first();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("financial_details.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveFinancialDetails(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "investment_range" =>  "required",
                "willing_to_invest"   =>  "required",
                "expected_monthly_earning"   =>  "required",
            ]);
            
            $isExist = FinancialDetail::where("id", Auth::id())->exists();
            // echo "<pre>";
            // print_r($isExist);
            // echo empty($isExist);
            if($isExist){
                // echo "if"; exit;
                $update = FinancialDetail::where("id", Auth::id())->update([
                    "user_id"                   =>  Auth::id(),
                    "willing_to_invest"         =>  $request->input("willing_to_invest"),
                    "investment_range"          =>  $request->input("investment_range"),
                    "expected_monthly_earning"  =>  $request->input("expected_monthly_earning"),
                    "updated_at"            =>  date("Y-m-d H:i:s")
                ]);
                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            }else{
                // echo "else"; exit;
                $create = FinancialDetail::create([
                    "user_id"                   =>  Auth::id(),
                    "willing_to_invest"         =>  $request->input("willing_to_invest"),
                    "investment_range"          =>  $request->input("investment_range"),
                    "expected_monthly_earning"  =>  $request->input("expected_monthly_earning"),
                ]);

                if ($create) {
                    return back()->with("success", "Successfully Inserted!!!");
                }
            }
            exit("bahar");
            return back()->with("error", "There is some issue in inserted or updated");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }
}
