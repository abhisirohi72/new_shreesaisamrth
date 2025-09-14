<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\PackageTransfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionHistory;

class PackageController extends Controller
{
    public function __construct()
    {
        
    }

    public function pckgTransfer(Request $request){
        $title      = "Package Transfer";
        $details    = Investment::all();
        return view("admin.pck.add",[
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addPackageTransfer(Request $request){
        $request->validate([
            "package_id"    =>  "required",
            "email"         =>  "required"
        ]);

        try {
            $t_user_details= User::where("email", $request->input("email"))->first();
            $insert= PackageTransfer::create([
                "user_id"   =>  Auth::id(),
                "t_user_id" =>  $t_user_details->id,
                "pckg_id"   =>  $request->input("package_id")
            ]);

            $get_pckg_details= Investment::where("id", $request->input("package_id"))->first();

            TransactionHistory::create([
                "user_id"           =>  Auth::id(),
                "previous_wallet"   =>  0,
                "current_wallet"    =>  0,
                "reason"            =>  "Package trasnfer via Admin to ".$t_user_details->email." where package name is ".$get_pckg_details->package_name,
            ]);
            return back()->with("success", "Records has been successfully inserted!!!");
        }catch (\Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }
}
