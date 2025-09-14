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
use App\Models\Availability;

class AvailabilityController extends Controller
{
    public function __construct()
    {
        
    }

    public function addAvailability(Request $request) : View{
        $title = "Add Marketing Skills";

        $details= Availability::where("id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("availability.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveAvailability(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "daily_commitment"  =>  "required"
            ]);

            $isExist = Availability::where("id", Auth::id())->exists();
            // echo "<pre>";
            // print_r($isExist);
            // echo empty($isExist);
            if($isExist){
                // echo "if"; exit;
                $update = Availability::where("id", Auth::id())->update([
                    "user_id"               =>  Auth::id(),
                    "part_time"    =>  $request->input("part_time")?? "no",
                    "full_time"      =>  $request->input("full_time")?? "no",
                    "daily_commitment"          =>  $request->input("daily_commitment")?? "0",
                    "target_based"          =>  $request->input("target_based")?? "no",
                    "updated_at"            =>  date("Y-m-d H:i:s")
                ]);
                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            }else{
                // echo "else"; exit;
                $create = Availability::create([
                    "user_id"               =>  Auth::id(),
                    "part_time"    =>  $request->input("part_time")?? "no",
                    "full_time"      =>  $request->input("full_time")?? "no",
                    "daily_commitment"          =>  $request->input("daily_commitment")?? "0",
                    "target_based"          =>  $request->input("target_based")?? "no",
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
