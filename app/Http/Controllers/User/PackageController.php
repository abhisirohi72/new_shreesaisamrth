<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\PackageTransfer;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\UserPackagePurchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PackageController extends Controller
{
    public function __construct()
    {
        
    }

    public function userShowPackage(Request $request){
        $title = "Show Investment Packages";

        $details= Investment::all();
        // echo Carbon::now(); exit;

        $purchased_package= UserPackagePurchase::where("user_id", Auth::id())->pluck("package_id")->toArray();
        
        return view("user.package.view", [
            "title"             =>  $title,
            "details"           =>  $details,
            "purchased_package"  =>  $purchased_package
        ]);
    }

    public function userPackagePurchase(Request $request, $package_id){
        $user_wallet = User::where("id", Auth::id())->value("wallet");
        // echo Auth::id()."<br>";
        $get_package_amnt= Investment::where("id", $package_id)->value("amount");

        if($user_wallet < $get_package_amnt){
            return back()->with("error", "Wallet Amount Not Exist!!!");
        }
        // echo $user_wallet; exit;
        $remain_wallet= ($user_wallet- $get_package_amnt);

        $update = User::where("id", Auth::id())->update([
            "wallet"    =>  $remain_wallet
        ]);

        //calculate netx month date
        $date = Carbon::now(); // or Carbon::parse('2025-04-04')
        $dayWithoutLeadingZero = $date->format('j');
        if($dayWithoutLeadingZero <=10 && $dayWithoutLeadingZero >= 1){
            $current_date = date("Y-m-")."11";
        }elseif($dayWithoutLeadingZero <= 20 && $dayWithoutLeadingZero >= 11){
            $current_date = date("Y-m-")."21";
        }else{
            $current_date = date("Y-m-")."01";
        }
        $next_date = Carbon::parse($current_date);
        $nextMonth = $next_date->addMonth(); // Adds 1 month
        $next_date = $nextMonth->toDateString()." ".date("H:m:s");
        // exit;
        // $check = 

        if($update){
            UserPackagePurchase::create([
                "package_id"    =>  $package_id,
                "user_id"       =>  Auth::id(),
                "next_date"     =>  $next_date,
            ]);
            //update in history table
            $history_update = TransactionHistory::create([
                "user_id"           =>  Auth::id(),
                "previous_wallet"   =>  $user_wallet,
                "current_wallet"    =>  $remain_wallet,
                "reason"            =>  "Package Purchase"
            ]);
            return back()->with("success", "Purchase Successfully!!!");
        }else{
            return back()->with("error", "There is some issue on purchasing!!!");
        }
    }

    public function userInvestmentHistory(Request $request){
        $title      = "Investment Packages History";

        $details    = UserPackagePurchase::with("investment")->where("user_id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details); exit;
        return view("user.package.history", [
            "title"    =>  $title,
            "details"  =>  $details
        ]);
    }

    public function getMonthDetails(Request $request){
        $user_pckg_id  = $request->input("user_pckg_id");
        $details= UserPackagePurchase::where("id", $user_pckg_id)->first();
        $send_repsonse= '';
        $current_date = date("Y-m-d", strtotime("+1 month", strtotime($details->created_at)));
        $date = Carbon::parse($current_date);
        $nextDate = $date->copy(); // e.g., 2025-04-11
        $brkDate = explode("-", $nextDate->toDateString());

        // ✅ Safely cast day part to integer
        $dayOfMonth = (int) $brkDate[2];

        // Decide fixed day based on day
        if ($dayOfMonth >= 1 && $dayOfMonth <= 10) {
            $fixedDay = "11";
        } elseif ($dayOfMonth >= 11 && $dayOfMonth <= 20) {
            $fixedDay = "21";
        } else {
            $fixedDay = "01";
        }

        for ($counter = 1; $counter <= 14; $counter++) {
            // Generate the date with updated month and fixed day
            $newDate = $nextDate->format('Y-m') . '-' . $fixedDay;

            $yes = '<span class="badge bg-danger">no</span>';
            if ($counter <= $details->total) {
                $yes = '<span class="badge bg-success">yes</span>';
            }

            $send_repsonse .= '<tr><td><span class="badge bg-primary">' . $newDate . '</span></td><td>' . $yes . '</td></tr>';

            // Move to next month
            $nextDate->addMonth();
        }
        return response()->json(['data'=> $send_repsonse]);
    }

    public function userPackageTransfer(Request $request){
        $title      = "User Package Transfer";

        $details    = Investment::all();
        return view("user.package.transfer.add", [
            "title"    =>  $title,
            "details"  =>  $details
        ]);
    }

    public function addUserPackageTransfer(Request $request){
        $request->validate([
            "package_id"    =>  "required",
            "email"         =>  "required"
        ]);

        try {
            //firstly check user wallet exist
            $user_old_wallet = Auth::user()->wallet;
            //get package_details
            $get_pckg_details= Investment::where("id", $request->input("package_id"))->first();

            if($get_pckg_details->amount <= $user_old_wallet){
                $t_user_details= User::where("email", $request->input("email"))->first();
                $insert= PackageTransfer::create([
                    "user_id"   =>  Auth::id(),
                    "t_user_id" =>  $t_user_details->id,
                    "pckg_id"   =>  $request->input("package_id")
                ]);

                $pckg_purchase = UserPackagePurchase::create([
                    "package_id"    =>  $request->input("package_id"),
                    "user_id"       =>  $t_user_details->id,
                    "next_date"     =>  date('Y-m-d H:i:s', strtotime('+1 month'))
                ]);

                $new_amount = ($user_old_wallet - $get_pckg_details->amount);

                $update_in_user = User::where("id", Auth::id())->update([
                    "wallet"    =>  $new_amount
                ]);

                TransactionHistory::create([
                    "user_id"           =>  Auth::id(),
                    "previous_wallet"   =>  $user_old_wallet,
                    "current_wallet"    =>  $new_amount,
                    "reason"            =>  "Package trasnfer to ".$t_user_details->email,
                ]);
                return back()->with("success", "Records has been successfully inserted!!!");
            }else{
                return back()->with("error", "Insufficient Balance");
            }
        }catch (\Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }
}
