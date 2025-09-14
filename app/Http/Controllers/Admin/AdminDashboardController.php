<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminAddFund;
use App\Models\DepositFund;
use App\Models\User;
use App\Models\UserPackagePurchase;
use App\Models\UserWithdrawl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\AdminSidebarService;

class AdminDashboardController extends Controller
{
    // protected $adminSidebarService;

    // public function __construct(AdminSidebarService $adminSidebarService)
    public function __construct()
    {

    }

    public function index(Request $request) : View{
        $title                  =   "Admin Login";
        $start_date             =   date("Y-m-d 00:00:00");
        $end_date               =   date("Y-m-d 23:59:59");
        $today_user             =   User::whereBetween('created_at', [$start_date, $end_date])->count();
        $today_withdrawl        =   UserWithdrawl::whereBetween('created_at', [$start_date, $end_date])->sum('f_amount');
        $total_withdrawl        =   UserWithdrawl::sum("f_amount");
        $today_approved_fund    =   DepositFund::whereBetween("created_at", [$start_date, $end_date])->where("status", "1")->sum('amount');
        $today_add_fund         =   AdminAddFund::whereBetween("created_at", [$start_date, $end_date])->sum("amount");
        $today_pending_fund     =   DepositFund::whereBetween("created_at", [$start_date, $end_date])->where("status", "2")->sum('amount');
        $last_login             =   Auth::user()->last_login;
        $total_registered_user  =   User::where("user_type", "2")->count();
        $total_active_user      =   UserPackagePurchase::select("user_id")->distinct()->count();
        $total_user_wallet      =   User::where("user_type", "2")->sum("wallet");
        $total_pckg_purchase    =   UserPackagePurchase::with("investment")->get()->sum(function ($purchase){
            return $purchase->investment->amount ?? 0;
        });
        // echo $total_pckg_purchase; exit;

        return view("admin.dashboard", [
            "title"                 =>  $title,
            "today_user"            =>  $today_user,
            "today_withdrawl"       =>  $today_withdrawl,
            "today_approved_fund"   =>  ($today_approved_fund+$today_add_fund),
            "today_pending_fund"    =>  $today_pending_fund,
            "last_login"            =>  $last_login,
            "total_registered_user" =>  $total_registered_user,
            "total_active_user"     =>  $total_active_user,
            "total_user_wallet"     =>  $total_user_wallet,
            "total_pckg_purchase"   =>  $total_pckg_purchase,
            "total_withdrawl"       =>  $total_withdrawl
        ]);
    }

    public function checkAdminLogin(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "email"     =>  "required",
                "password"  =>  "required",
            ]);

            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                $request->session()->regenerate();
                session(['admin' => Auth::user()]);
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }
    
            return back()->with('error', 'Invalid email or password.');
            return back()->with("error", "There is some issue in inserted or updated");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    } 
}
