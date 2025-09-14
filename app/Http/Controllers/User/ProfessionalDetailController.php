<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\ProfessionalDetail;
use Illuminate\Support\Facades\Auth;

class ProfessionalDetailController extends Controller
{
    public function __construct()
    {
        
    }

    public function addProfessionalDetails(Request $request) : View{
        $title = "Add Professional Details";

        $details= ProfessionalDetail::where("id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("professional_details.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveInfo(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "current_occupation" =>  "required",
                "previous_mlm_exp"   =>  "required"
            ]);
            
            $isExist = ProfessionalDetail::where("id", Auth::id())->exists();
            // echo "<pre>";
            // print_r($isExist);
            // echo empty($isExist);
            if($isExist){
                // echo "if"; exit;
                $update = ProfessionalDetail::where("id", Auth::id())->update([
                    "user_id"               =>  Auth::id(),
                    "current_occupation"    =>  $request->input("current_occupation"),
                    "previous_mlm_exp"      =>  $request->input("previous_mlm_exp"),
                    "company_name"          =>  $request->input("company_name"),
                    "network_size"          =>  $request->input("network_size"),
                    "updated_at"            =>  date("Y-m-d H:i:s")
                ]);
                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            }else{
                // echo "else"; exit;
                $create = ProfessionalDetail::create([
                    "user_id"               =>  Auth::id(),
                    "current_occupation"    =>  $request->input("current_occupation"),
                    "previous_mlm_exp"      =>  $request->input("previous_mlm_exp"),
                    "company_name"          =>  $request->input("company_name"),
                    "network_size"          =>  $request->input("network_size")
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
