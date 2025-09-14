<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Plan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Models\DirectIncome;
use App\Models\ReferalIncome;
use App\Models\AddViewIncome;
use App\Models\TaskIncome;
use App\Models\BusinessVolume;
use App\Models\PurchaseVolume;
use App\Models\RewardsIncome;
use App\Models\PlanVideo;
use App\Models\PDF;
use App\Models\Ads;
use App\Models\Investment;
use App\Models\PackageDistribution;

class PlanController extends Controller
{
    public function __construct() {}

    public function addEditAdminPlan(Request $request, $id= null): View
    {
        $title = (isset($id)) ? "Edit Plan": "Edit Plan";

        $details= [];
        if(isset($id)){
            $details = Plan::where("id", $id)->first();
        }
        // echo "<pre>";
        // print_r($details);
        // exit;

        return view("admin.plan.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addEditAdminPlanVideo(Request $request, $id= null): View
    {
        $title = (isset($id)) ? "Edit Plan Video": "Add Plan Video";

        $details= [];
        if(isset($id)){
            $details = Plan::where("id", $id)->first();
        }
        // echo "<pre>";
        // print_r($details);
        // exit;

        return view("admin.plan.add_video", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addEditAdminPlanPDF(Request $request): View
    {
        $title = (isset($id)) ? "Edit Plan Video": "Add Plan PDF";

        $details= [];
        if(isset($id)){
            $details = Plan::where("id", $id)->first();
        }
        // echo "<pre>";
        // print_r($details);
        // exit;

        return view("admin.plan.add_pdf", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addAdminPlanADS(Request $request){
        $title = "Add ADS";

        return view("admin.plan.add_ads", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function investmentPlan(Request $request){
        $title = "Investment Plan";

        return view("admin.plan.investment.add", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function viewInvestmentPlan(Request $request){
        $title = "View Investment Plan";
        $details= Investment::all();
        return view("admin.plan.investment.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function investmentDistribution(Request $request, $id){
        $title = "Investment Distribution";
        return view("admin.plan.investment.distribution", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function saveInvestment(Request $request){
        $request->validate([
            "package_name"      =>  "required|unique:investments",
            "amount"            =>  "required"
        ]);

        try {
            $insert= Investment::create([
                "package_name"  =>  $request->input("package_name"),
                "amount"        =>  $request->input("amount")
            ]);

            if ($insert) {
                return back()->with("success", "Successfully Inserted...");
            }else{
                return back()->with("error", "Therer is some issue on inserting...");
            }
        }catch (\Throwable $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function saveAdminPlan(Request $request)
    {
        return $this->saveUpdatePlan($request);
    }

    public function viewAdminPlan(Request $request){
        $title = "View Plan";
        $details = Plan::all();
        return view("admin.plan.view", [
            "title"     =>  $title,
            'details'   =>  $details
        ]);
    }

    public function saveUpdatePlan(Request $request)
    {
        try {
            $validation_array = [
                "plan_name" => "required",
                "joinning_fees" => "required",
                "commision_type" => "required",
                "payout_method" => "required",
                "min_withdrawl_limit" => "required",
            ];
            // echo $request->input("edit_id");
            // exit;
            if ($request->input("edit_id")) {
                $request->validate($validation_array);
                $plan_image = $request->input("old_image");
                if ($request->hasFile("image") && $request->file('image')->isValid()) {
                    $directory = "documents/plan";
                    Storage::disk('public')->makeDirectory($directory);
                    
                    $file = $request->file('image');
                    $plan_image = "image_" . time() . "." . $file->extension();
                    $image_path = $file->storeAs($directory, $plan_image, 'public');
                    Log::info("Plan image stored at: " . $image_path);
                }

                $update = Plan::where("id", $request->input("edit_id"))->update([
                    "plan_name" => $request->input("plan_name"),
                    "joinning_fees" => $request->input("joinning_fees"),
                    "commision_type" => $request->input("commision_type"),
                    "payout_method" => $request->input("payout_method"),
                    "min_withdrawl_limit" => $request->input("min_withdrawl_limit"),
                    "image" => $plan_image,
                ]);
                if ($update) {
                    Log::info("Plan inserted successfully.");
                    return redirect()->back()->with("success", "Successfully Updated!!!");
                }
    
                Log::error("Plan insertion failed.");
                return redirect()->back()->with("error", "There is some issue in insertion.");
            } else {
                $validation_array["image"] = "required|image|mimes:jpg,jpeg,png|max:2048";
                $request->validate($validation_array);
    
                $directory = "documents/plan";
                Storage::disk('public')->makeDirectory($directory);
    
                $plan_image = null;
    
                if ($request->hasFile("image") && $request->file('image')->isValid()) {
                    $file = $request->file('image');
                    $plan_image = "image_" . time() . "." . $file->extension();
                    $image_path = $file->storeAs($directory, $plan_image, 'public');
                    Log::info("Plan image stored at: " . $image_path);
                }
    
                $create = Plan::create([
                    "plan_name" => $request->input("plan_name"),
                    "joinning_fees" => $request->input("joinning_fees"),
                    "commision_type" => $request->input("commision_type"),
                    "payout_method" => $request->input("payout_method"),
                    "min_withdrawl_limit" => $request->input("min_withdrawl_limit"),
                    "image" => $plan_image,
                ]);
    
                if ($create) {
                    Log::info("Plan inserted successfully.");
                    return redirect()->back()->with("success", "Successfully Inserted!!!");
                    dd("Redirect executed"); // This should appear on screen

                }
    
                Log::error("Plan insertion failed.");
                return redirect()->back()->with("error", "There is some issue in insertion.");
                dd("Redirect executed"); // This should appear on screen

            }
    
            return redirect()->back()->with("error", "There is some issue in inserted");
            dd("Redirect executed"); // This should appear on screen

        } catch (\Exception $exception) {
            Log::error("Error in saveUpdatePlan: " . $exception->getMessage());
            return redirect()->back()->with("error", "An error occurred: " . $exception->getMessage());
        }
    }

    public function adminPlanChangeStatus($id, $status,Request $request){
        try{
            $change = Plan::where("id", $id)->update([
                "status"    =>  $status
            ]);

            if ($change) {
                return redirect()->back()->with("success", "Successfully Updated!!!");
            }else{
                return redirect()->back()->with("error", "There is some issue in updation.");
            }
        } catch (\Exception $exception) {
            Log::error("Error in saveUpdatePlan: " . $exception->getMessage());
            return redirect()->back()->with("error", "An error occurred: " . $exception->getMessage());
        }
    }

    public function adminPlanReferal($plan_id, Request $request){
        $title = "Plan Referal Details";
        
        return view("admin.plan.referal", [
            "title"     =>  $title,
            'plan_id'   =>  $plan_id
        ]);
    }

    public function saveDirectIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = DirectIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    $update = DirectIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    $insert = DirectIncome::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function saveReferalIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = ReferalIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    ReferalIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    ReferalIncome::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function saveRewardsIncome(Request $request){
        try{
            // Validate inputs
            // $request->validate([
            //     'target.*' => 'required|numeric',
            //     'rewards.*' => 'required|numeric',
            //     'rewards_image.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            // ]);
            // Store main_level and rewards values
            $mainLevels = $request->input('main_level');
            $rewards = $request->input('rewards');

            // Handle file uploads
            $uploadedFiles = [];
            if ($request->hasFile('rewards_image')) {
                foreach ($request->file('rewards_image') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('uploads/rewards', $filename, 'public'); // Save file to storage

                    $uploadedFiles[] = $filename;
                }
            }
            foreach ($uploadedFiles as $key => $value) {
                $isExist = RewardsIncome::where("target", $request->input("target")[$key])->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    RewardsIncome::where("target", $request->input("target")[$key])->where("plan_id", $request->input("plan_id"))->update([
                        "plan_id"   =>  $request->input("plan_id"),
                        "target"    =>  $request->input("target")[$key],
                        "rewards"   =>  $request->input("rewards")[$key],
                        "image"     =>  $value    
                    ]);
                }else{
                    RewardsIncome::create([
                        "plan_id"   =>  $request->input("plan_id"),
                        "target"    =>  $request->input("target")[$key],
                        "rewards"   =>  $request->input("rewards")[$key],
                        "image"     =>  $value
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function saveViewIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = AddViewIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    AddViewIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    AddViewIncome::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function saveTaskIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = TaskIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    TaskIncome::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    TaskIncome::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function saveBusinessIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = BusinessVolume::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    BusinessVolume::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    BusinessVolume::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function savePurchaseIncome(Request $request){
        try{
            $level_data = $request->input('level_data');
            foreach($level_data as $key=>$details){
                //check level name is exist or not
                $isExist = PurchaseVolume::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->first();
                if($isExist){
                    PurchaseVolume::where("level_name", "Level ".$key+1)->where("plan_id", $request->input("plan_id"))->update([
                        "level_value"   =>  $details,
                    ]);
                }else{
                    PurchaseVolume::create([
                        "plan_id"       =>  $request->input("plan_id"),
                        "level_name"    =>  "Level ".$key+1,
                        "level_value"   =>  $details,
                    ]);
                }
            }
            echo 1;
        }catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function savePlanVideo(Request $request){
        try {
            $validation_array =[
                "title"         => "required",
            ];

            if (!$request->input('edit_id')) {
                $request->validate([
                    'video_upload'  => 'nullable|file|mimes:mp4,mov,avi|required_without:video_link',
                    'video_link'    => 'nullable|url|required_without:video_upload',
                ]);    
            }

            // Handle file uploads
            $filename = "";
            if ($request->hasFile('video_upload')) {
                $file = $request->file("video_upload");
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/plan_videos', $filename, 'public'); // Save file to storage
            }

            if($request->input('edit_id') && filled($request->input('edit_id'))){
                $details= PlanVideo::where("id", $request->input('edit_id'))->first();
            }else{
                $insert= PlanVideo::create([
                    "title"         =>  $request->input("title"),
                    "video_upload"  =>  $filename,
                    "video_link"    =>  $request->input("video_link")
                ]);

                if ($insert) {
                    return back()->with("success", "Records has been inserted!!!");
                }else{
                    return back()->with("error", "There is some issue on inserted!!!");
                }
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function savePlanPDF(Request $request){
        try {
            $validation_array =[
                "title"         => "required",
            ];

            if (!$request->input('edit_id')) {
                $request->validate([
                    'pdf'  => 'required|file|mimes:pdf|max:2048'
                ]);    
            }

            // Handle file uploads
            $filename = "";
            if ($request->hasFile('pdf')) {
                $file = $request->file("pdf");
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/plan_pdf', $filename, 'public'); // Save file to storage
            }

            if($request->input('edit_id') && filled($request->input('edit_id'))){
                $details= PDF::where("id", $request->input('edit_id'))->first();
            }else{
                $insert= PDF::create([
                    "title"     =>  $request->input("title"),
                    "name"      =>  $filename
                ]);

                if ($insert) {
                    return back()->with("success", "Records has been inserted!!!");
                }else{
                    return back()->with("error", "There is some issue on inserted!!!");
                }
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function savePlanADS(Request $request){
        try {
            $validation_array =[
                "title" => "required",
                "url"   =>  "required"
            ];

            if($request->input('edit_id') && filled($request->input('edit_id'))){
                $details= Ads::where("id", $request->input('edit_id'))->first();
            }else{
                $insert= Ads::create([
                    "title"     =>  $request->input("title"),
                    "url"       =>  $request->input("url"),
                    "status"    =>  "0"
                ]);

                if ($insert) {
                    return back()->with("success", "Records has been inserted!!!");
                }else{
                    return back()->with("error", "There is some issue on inserted!!!");
                }
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function addInvestmentDistribution(Request $request){
        try {
            if($request->input('edit_id') && filled($request->input('edit_id'))){
                $details= Ads::where("id", $request->input('edit_id'))->first();
            }else{
                $total_counter  = count($request->input("hourly"));
                // echo "<br>";
                // echo $request->input("hourly")[0]; exit;
                for ($counter=0; $counter < $total_counter; $counter++) { 
                    $insert= PackageDistribution::create([
                        "package_id"    =>  $request->input("package_id"),
                        "hourly"        =>  $request->input("hourly")[$counter],
                        "daily"         =>  $request->input("dailywise")[$counter],
                        "monthly"       =>  $request->input("monthlywise")[$counter]
                    ]);    
                }
                if ($insert) {
                    return response()->json(["success"=>true]);
                }else{
                    return response()->json(["error"=>true]);
                }
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return response()->json(["error" => "Something went wrong.".$th->getMessage()]);
        }
    }
}
