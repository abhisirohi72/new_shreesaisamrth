<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use App\Models\AdminNotification;
use App\Models\PackagePurchaseHistory;
use App\Models\Popup;
use App\Models\UserPackagePurchase;
use App\Models\User;
use App\Models\TeamLevel;

class DashboardController extends Controller
{
    public function __construct() {}

    public function index(Request $request): View
    {
        // echo "dashboard"; exit;
        $title = "Dashboard";
        // $encrypt_data   = Crypt::encrypt(Auth::id());
        // dd(session()->all());
        $notice         = AdminNotification::inRandomOrder()->limit(1)->first();
        $my_investment  = UserPackagePurchase::with("investment")
            ->where("user_id", Auth::id())
            ->get()
            ->sum(function ($purchase) {
                return $purchase->investment->amount ?? 0;
            });
        $direct_memeber =   User::where("sponsor_id", Auth::id())->count();
        $direct_ids     =   User::where("sponsor_id", Auth::id())->pluck('id');
        $active_ids     =   UserPackagePurchase::whereIn("user_id", $direct_ids)->distinct('user_id')->count('id');
        $my_wallet      =   User::where("id", Auth::id())->value("wallet");
        $direct_income  =   PackagePurchaseHistory::where("user_id", Auth::id())->sum("amount");
        $popup          =   Popup::where("id", 1)->first();
        $total_team     =   $this->getDownlineUserIds(Auth::id());
        $inactive_ids   =   count($direct_ids)-$active_ids;

        $total_level    =   TeamLevel::where("id", 1)->value("team_level");
        $arr =[];
        // echo "<br>".Auth::id();
        $user_id= [Auth::id()];
        $total_business=0;
        for ($counter=0; $counter < $total_level; $counter++) { 
            $arr[$counter]['level']         =   $counter+1;
            $level_details                  =   $this->getLevelWiseUser($user_id);
            $arr[$counter]['investment']    =   $this->getUserInvestment(collect($level_details[1] ?? []));
            $total_business                 =   $total_business+$arr[$counter]['investment'];
            $user_id                        =   $level_details[1] ?? [];
        }
        $total_team_income  =   PackagePurchaseHistory::whereIn("user_id", $total_team)->sum("amount");
        // exit;
        // echo "<pre>";
        // var_dump($total_team);
        // exit;

        $page_name= "u_dashboard";
        return view("user.dashboard", [
            "title"             =>  $title,
            "encrypt"           =>  Auth::user()->unique_id,
            "notice"            =>  $notice,
            "my_investment"     =>  $my_investment,
            "direct_memeber"    =>  $direct_memeber,
            "topup_wallet"      =>  $my_wallet,
            "direct_income"     =>  $direct_income,
            "active_ids"        =>  $active_ids,
            "popup"             =>  $popup,
            "total_team"        =>  count($total_team),
            "inactive_ids"      =>  $inactive_ids,
            "total_business"    =>  $total_business,
            "total_team_income" =>  $total_team_income,
            'page_name'         =>  $page_name
        ]);
    }

    private function getUserInvestment($user_ids){
        return UserPackagePurchase::with("investment")
                            ->whereIn("user_id", $user_ids)
                            ->get()
                            ->sum(function($purchase){
                                return $purchase->investment->amount ?? 0;
                            });
    }

    private function getLevelWiseUser($user_id){
        $total          =   User::whereIn("sponsor_id", $user_id)->count();
        $total_user_ids =   User::whereIn("sponsor_id", $user_id)->pluck("id");
        return [$total, $total_user_ids];
    }

    private function getDownlineUserIds($userId, &$team = [])
    {
        $directs = User::where('sponsor_id', $userId)->pluck('id');

        foreach ($directs as $directId) {
            $team[] = $directId;
            $this->getDownlineUserIds($directId, $team);
        }

        return $team;
    }
}
