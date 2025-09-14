<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanVideo;
use App\Models\PDF;
use App\Models\Plan;
use App\Models\DirectIncome;
use App\Models\ReferalIncome;
use App\Models\RewardsIncome;
use App\Models\AddViewIncome;
use App\Models\TaskIncome;
use App\Models\BusinessVolume;
use App\Models\PurchaseVolume;
use App\Models\Epin;
use App\Models\PlanPurchase;
use App\Models\User;
use App\Models\RewardCalculation;
use App\Models\Ads;
use Illuminate\Support\Facades\Auth;


class PlanVideoController extends Controller
{
    public function viewPlanVideo(Request $request){
        $title = "View Plan Video";

        $details= PlanVideo::all();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("user.plan.video.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function viewPlanPDF(Request $request){
        $title = "View Plan PDF";

        $details= PDF::all();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("user.plan.pdf.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function userPlanView(Request $request){
        $title = "User Plan View";

        $details= Plan::with(["direct_income", "referal_income", "rewards_income", "add_view_income", "task_income", "business_volume", "purchase_volume", "plan_purchase"])->where("status", "1")->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("user.plan.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function userPlanADSView(Request $request){
        $title = "User Plan ADS View";

        $details= Ads::where("status", "1")->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("user.plan.ads.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function downloadPDF($filename){
        $filePath = storage_path("app/public/uploads/plan_pdf/") . $filename;

        if (!file_exists($filePath)) {
            return back()->with('error', 'File not found.');
        }

        return response()->download($filePath);
    }

    public function planDetails(Request $request){
        $request->input("type");
        $request->input("id");
        $details= [];
        if($request->input("type")=="direct_income"){
            $details= DirectIncome::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="referal_income"){
            $details= ReferalIncome::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="rewards_income"){
            $details= RewardsIncome::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="add_view_income"){
            $details= AddViewIncome::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="task_income"){
            $details= TaskIncome::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="business_volume"){
            $details= BusinessVolume::where("plan_id", $request->input("id"))->get();
        }elseif($request->input("type")=="purchase_volume"){
            $details= PurchaseVolume::where("plan_id", $request->input("id"))->get();
        }

        return response()->json($details);
    }

    public function planPurchasing(Request $request){
        //get total amount on wallet and epin
        $type= $request->input("type");
        $plan_id= $request->input("plan_id");
        $pin_details= $request->input("pin_details");

        //get plan details
        $plan_details= Plan::where("id", $plan_id)->first();
        if($type=="epin"){
            if(filled($pin_details)){
                //check pin exist or not
                $is_epin_exist = Epin::where("epin_name", $pin_details)->where("status", "0")->where("amnt", $plan_details->min_withdrawl_limit)->where("user_id", Auth::id())->first();
                // echo "<pre>";
                // print_r($is_epin_exist);
                // exit;
                if(!$is_epin_exist){
                    return response()->json(['error' => 'Epin Not Exist!!!'], 200);
                }else{
                    $plan_purchase = PlanPurchase::create([
                        "user_id"   =>  Auth::id(),
                        "plan_id"   =>  $plan_id,
                        "price"     =>  $plan_details->min_withdrawl_limit
                    ]);

                    if($plan_purchase){
                        //check plan exist on directincome
                        // $isExistDirectIncome = DirectIncome::where("plan_id", $plan_id)->get();
                        $isExistDirectIncome = $this->checkDirectIncome($plan_id);
                        $isExistReferalIncome = $this->checkReferalIncome($plan_id);
                        $isExistReferalIncome = $this->checkRewardsIncome($plan_id);

                        //epin update
                        $epin_update = Epin::where("epin_name", $pin_details)->where("status", "0")->where("amnt", $plan_details->min_withdrawl_limit)->where("user_id", Auth::id())->update([
                            "status"    =>  "1"
                        ]);
                        if ($epin_update) {
                            return response()->json(['success' => 'Plan purchase successfully!!!'], 200);
                        }else{
                            return response()->json(['error' => 'There is some issue on inserting!!!'], 200);
                        }
                    }
                }
            }else{
                return response()->json(['error' => 'Epin Not Exist!!!'], 200);
            }
        }elseif($type=="wallet"){
            $isWalletExist = User::where("id", Auth::id())
                                ->where("wallet", ">=", $plan_details->min_withdrawl_limit)
                                ->get();
            // echo "<pre>";

            if (!$isWalletExist) {
                return response()->json(['error' => 'Wallet Amount Not Sufficient!!!'], 200);
            }else{
                $plan_purchase = PlanPurchase::create([
                    "user_id"   =>  Auth::id(),
                    "plan_id"   =>  $plan_id,
                    "price"     =>  $plan_details->min_withdrawl_limit
                ]);

                if($plan_purchase){
                    //check plan exist on directincome
                    // $isExistDirectIncome = DirectIncome::where("plan_id", $plan_id)->get();
                    $isExistDirectIncome = $this->checkDirectIncome($plan_id);
                    $isExistReferalIncome = $this->checkReferalIncome($plan_id);
                    $isExistReferalIncome = $this->checkRewardsIncome($plan_id);

                    //wallet update
                    $prev_wallet= User::where("id", Auth::id())->first();
                    $new_wallet = ($prev_wallet->wallet - $plan_details->min_withdrawl_limit);

                    $wallet_update = User::where("id", Auth::id())->update([
                        "wallet"    =>  $new_wallet
                    ]);
                    if ($wallet_update) {
                        return response()->json(['success' => 'Plan purchase successfully!!!'], 200);
                    }else{
                        return response()->json(['error' => 'There is some issue on inserting!!!'], 200);
                    }
                }
            }
        }
    }

    public function checkRewardsIncome($plan_id){
        $isExist = ReferalIncome::where("plan_id", $plan_id)->get();
        $totalRows = ReferalIncome::where("plan_id", $plan_id)->count();
        // echo "<pre>";
        // print_r($isExist);
        if($isExist){
            $user_id= Auth::id();
            $get_sponsor_ids= $this->getReferalOnlyID($user_id);
            $total_amount = 0;
            for ($counter=0; $counter < $totalRows; $counter++) { 
                if(isset($get_sponsor_ids[$counter])){
                    $total_amount += PlanPurchase::where("user_id", $get_sponsor_ids[$counter])->where("plan_id", $plan_id)->sum("price");
                }
            }
            $rewards_inc = RewardsIncome::where("plan_id", $plan_id)->get();
            foreach($rewards_inc as $detail){
                if ($detail->target <= $total_amount) {
                    $total_sum = RewardsIncome::where("id", ">=", $detail->id)->sum('target');
                    if($total_sum <= $total_amount){
                        //check rewards exist on reward_calculations
                        $isExistRewardsCalc= RewardCalculation::where("user_id", Auth::id())->where("rewards_id", $detail->id)->first();
                        if (!$isExistRewardsCalc) {
                            //get user wallet 
                            $user_wallet= User::where("id", Auth::id())->value("wallet");
                            $new_wallet= ($user_wallet+$detail->rewards);
                            $update_user_wallet= User::where("id", Auth::id())->update([
                                "wallet"    =>  $new_wallet
                            ]);

                            //insert in reward_calculations
                            $insert= RewardCalculation::create([
                                "user_id"       =>  Auth::id(),
                                "rewards_id"    =>  $detail->id
                            ]);
                        }
                    }
                }
            }
            return true;
        }
    }

    public function checkDirectIncome($plan_id){
        $isExist = DirectIncome::where("plan_id", $plan_id)->get();
        $totalRows = DirectIncome::where("plan_id", $plan_id)->count();
        // echo "<pre>";
        // print_r($isExist);
        if($isExist){
            $user_id= Auth::id();
            for ($counter=0; $counter < $totalRows; $counter++) { 
                // echo "<br>c=".$counter."<br>useri=".$user_id;
                $get_sponsor= $this->getSponsor($user_id);
                // echo "<pre>";
                // print_r($get_sponsor);
                // exit;
                if(isset($get_sponsor)){
                    $prev_wallet= $get_sponsor->wallet;//exit;
                    $new_wallet = ($prev_wallet+$isExist[$counter]->level_value);//exit;
                    // echo $get_sponsor->id; exit;

                    //update amount on sponsor
                    User::where("id", $get_sponsor->id)->update([
                        "wallet"    =>  $new_wallet
                    ]);
                    $user_id = $get_sponsor->id;
                }
            }
            return true;
        }
    }

    public function checkReferalIncome($plan_id){
        $isExist = ReferalIncome::where("plan_id", $plan_id)->get();
        $totalRows = ReferalIncome::where("plan_id", $plan_id)->count();
        // echo "<pre>";
        // print_r($isExist);
        if($isExist){
            $user_id= Auth::id();
            $get_sponsor= $this->getReferal($user_id);
            for ($counter=0; $counter < $totalRows; $counter++) { 
                if(isset($get_sponsor[$counter])){
                    $prev_wallet= $get_sponsor[$counter]->wallet;//exit;
                    $new_wallet = ($prev_wallet+$isExist[$counter]->level_value);//exit;
                    // echo $get_sponsor->id; exit;

                    //update amount on sponsor
                    User::where("id", $get_sponsor[$counter]->id)->update([
                        "wallet"    =>  $new_wallet
                    ]);
                    // $user_id = $get_sponsor->id;
                }
            }
            return true;
        }
    }

    private function getReferalOnlyID($user_id){
        return User::where("sponsor_id", $user_id)->pluck("id")->toArray();
        // return User::where("id", $get_sponsor_id->sponsor_id)->first();
    }

    private function getReferal($user_id){
        return User::where("sponsor_id", $user_id)->get();
        // return User::where("id", $get_sponsor_id->sponsor_id)->first();
    }

    private function getSponsor($user_id){
        $get_sponsor_id= User::where("id", $user_id)->first();
        return User::where("id", $get_sponsor_id->sponsor_id)->first();
    }
}
