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

class MarketingSkillsController extends Controller
{
    public function __construct()
    {
        
    }

    public function addMarketingSkill(Request $request) : View{
        $title = "Add Marketing Skills";

        $details= Marketing::where("id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("marketing_skills.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveMarketingSkill(Request $request): RedirectResponse
    {
        try {
            
            $isExist = Marketing::where("id", Auth::id())->exists();
            // echo "<pre>";
            // print_r($isExist);
            // echo empty($isExist);
            if($isExist){
                // echo "if"; exit;
                $update = Marketing::where("id", Auth::id())->update([
                    "user_id"               =>  Auth::id(),
                    "fb"    =>  $request->input("fb")?? "no",
                    "instagram"      =>  $request->input("instagram")?? "no",
                    "linkedin"          =>  $request->input("linkedin")?? "no",
                    "whatsapp"          =>  $request->input("whatsapp")?? "no",
                    "selling"          =>  $request->input("selling")?? "no",
                    "lead_generation"          =>  $request->input("lead_generation")?? "no",
                    "referal_business"          =>  $request->input("referal_business")?? "no",
                    "public_speaking"          =>  $request->input("public_speaking")?? "no",
                    "updated_at"            =>  date("Y-m-d H:i:s")
                ]);
                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            }else{
                // echo "else"; exit;
                $create = Marketing::create([
                    "user_id"               =>  Auth::id(),
                    "fb"    =>  $request->input("fb") ?? "no",
                    "instagram"      =>  $request->input("instagram")?? "no",
                    "linkedin"          =>  $request->input("linkedin")?? "no",
                    "whatsapp"          =>  $request->input("whatsapp")?? "no",
                    "selling"          =>  $request->input("selling")?? "no",
                    "lead_generation"          =>  $request->input("lead_generation")?? "no",
                    "referal_business"          =>  $request->input("referal_business")?? "no",
                    "public_speaking"          =>  $request->input("public_speaking")?? "no",
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
