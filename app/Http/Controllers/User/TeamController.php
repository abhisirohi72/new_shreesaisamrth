<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\UserPackagePurchase;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\TeamLevel;
use App\Models\User;

use Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        
    }

    public function myLevelList(Request $request){
        $title = "My Level View";
        $total_level = TeamLevel::where("id", 1)->value("team_level");
        $arr =[];
        $user_id= [Auth::id()];
        $total_business=0;
        for ($counter=0; $counter < $total_level; $counter++) { 
            $arr[$counter]['level']         = $counter+1;
            // $arr[$counter]['user_id']   = $user_id;
            $level_details                  =   $this->getLevelWiseUser($user_id);
            $arr[$counter]['total']         =   $level_details[0] ?? '';
            $arr[$counter]['ids']           =   collect($level_details[1] ?? []);
            $arr[$counter]['test']          =   $level_details[1] ?? [];
            $arr[$counter]['investment']    =   $this->getUserInvestment(collect($level_details[1] ?? []));
            $total_business                 =   $total_business+$arr[$counter]['investment'];
            $user_id                        =   $level_details[1] ?? [];
        }
        // echo $total_business; exit;
        return view("user.team_level.view",[
            "title"     =>  $title,
            "details"   =>  $arr,
            "total_business"    =>  $total_business
        ]);
    }

    public function userLevelList(Request $request, $level, $user_ids){
        $title          =   "User Level List";
        $ids_array      =   explode(",", $user_ids);
        $get_details    =   User::whereIn("id", $ids_array)->get();
        $details        =   [];
        $counter        =   1;
        // echo "<pre>";
        // print_r($get_details);
        // exit;
        $total_business=0;
        foreach($get_details as $detail){
            $details[$counter]["name"]          =   $detail->name;
            $details[$counter]["unique_id"]     =   $detail->unique_id;
            $details[$counter]["email"]         =   $detail->email;
            $details[$counter]["investment"]    =   $this->getUserInvestment([$detail->id]);
            $total_business                     =   $total_business+$details[$counter]['investment'];
            $counter++;
        }
        return view("user.team_level.level_list_view",[
            "title"             =>  $title,
            "details"           =>  $details,
            "level"             =>  $level,
            "total_business"    =>  $total_business
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

    public function myDirectLevelList(Request $request){
        $title              = "Direct Level";
        $get_direct_sponsor = User::where("sponsor_id", Auth::id())->pluck("id");
        $ids_array          =   explode(",", $get_direct_sponsor);
        $get_details        =   User::whereIn("id", $ids_array)->get();
        $details            =   [];
        $counter            =   1;
        // echo "<pre>";
        // print_r($get_details);
        // exit;
        $total_business=0;
        foreach($get_details as $detail){
            $details[$counter]["name"]          =   $detail->name;
            $details[$counter]["unique_id"]     =   $detail->unique_id;
            $details[$counter]["email"]         =   $detail->email;
            $details[$counter]["investment"]    =   $this->getUserInvestment([$detail->id]);
            $total_business                     =   $total_business+$details[$counter]['investment'];
            $counter++;
        }
        return view("user.team_level.level_list_view",[
            "title"             =>  $title,
            "details"           =>  $details,
            "level"             =>  1,
            "total_business"    =>  $total_business
        ]);
    }
}
