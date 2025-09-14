<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSideMenu;
use Illuminate\Support\Facades\Log;
use App\Models\AdminSideMenu;

class SideMenuController extends Controller
{
    public function __construct()
    {
        
    }

    public function sideMenu(Request $request){
        $title = "Add Side Menu";
        $details= UserSideMenu::where("id", 1)->first();

        return view("developer.side_menu.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function adminSideMenu(Request $request){
        $title = "Add Admin Side Menu";
        $details= AdminSideMenu::where("id", 1)->first();

        return view("developer.admin_side_menu.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function addPermissionSideMenu(Request $request){
        try {
            $details= UserSideMenu::where("id", 1)->first();
            if ($details) {
                $update = UserSideMenu::where("id", 1)->update([
                    "user_dashboard"            =>  ($request->input("user_dashboard")=='on') ? '1':'0',
                    "user_wallet_details"       =>  ($request->input("user_wallet_details")=='on') ? '1':'0',
                    "user_payout_request"       =>  ($request->input("user_payout_request")=='on') ? '1':'0',
                    "user_approved_payout"      =>  ($request->input("user_approved_payout")=='on') ? '1':'0',
                    "user_wallet_income"        =>  ($request->input("user_wallet_income")=='on') ? '1':'0',
                    "user_income_details"       =>  ($request->input("user_income_details")=='on') ? '1':'0',
                    "user_professional_details" =>  ($request->input("user_professional_details")=='on') ? '1':'0',
                    "user_financial_details"    =>  ($request->input("user_financial_details")=='on') ? '1':'0',
                    "user_marketing_details"    =>  ($request->input("user_marketing_details")=='on') ? '1':'0',
                    "user_availability_details" =>  ($request->input("user_availability_details")=='on') ? '1':'0',
                    "user_personal_info"        =>  ($request->input("user_personal_info")=='on') ? '1':'0',
                    "user_bank_details"         =>  ($request->input("user_bank_details")=='on') ? '1':'0',
                    "user_kyc_details"          =>  ($request->input("user_kyc_details")=='on') ? '1':'0',
                    "user_change_password"      =>  ($request->input("user_change_password")=='on') ? '1':'0',
                    "user_plan_video"           =>  ($request->input("user_plan_video")=='on') ? '1':'0',
                    "user_plan_pdf"             =>  ($request->input("user_plan_pdf")=='on') ? '1':'0',
                    "user_plan_view"            =>  ($request->input("user_plan_view")=='on') ? '1':'0',
                    "user_mail_support"         =>  ($request->input("user_mail_support")=='on') ? '1':'0',
                    "user_online_support"       =>  ($request->input("user_online_support")=='on') ? '1':'0',
                ]);
    
                if($update){
                    return back()->with("success", "Successfully Updated!!!");
                }else {
                    return back()->with("error", "There is some issue on updating!!!");
                }
            }else{
                $insert= UserSideMenu::create([
                    "user_dashboard"            =>  ($request->input("user_dashboard")=='on') ? '1':'0',
                    "user_wallet_details"       =>  ($request->input("user_wallet_details")=='on') ? '1':'0',
                    "user_payout_request"       =>  ($request->input("user_payout_request")=='on') ? '1':'0',
                    "user_approved_payout"      =>  ($request->input("user_approved_payout")=='on') ? '1':'0',
                    "user_wallet_income"        =>  ($request->input("user_wallet_income")=='on') ? '1':'0',
                    "user_income_details"       =>  ($request->input("user_income_details")=='on') ? '1':'0',
                    "user_professional_details" =>  ($request->input("user_professional_details")=='on') ? '1':'0',
                    "user_financial_details"    =>  ($request->input("user_financial_details")=='on') ? '1':'0',
                    "user_marketing_details"    =>  ($request->input("user_marketing_details")=='on') ? '1':'0',
                    "user_availability_details" =>  ($request->input("user_availability_details")=='on') ? '1':'0',
                    "user_personal_info"        =>  ($request->input("user_personal_info")=='on') ? '1':'0',
                    "user_bank_details"         =>  ($request->input("user_bank_details")=='on') ? '1':'0',
                    "user_kyc_details"          =>  ($request->input("user_kyc_details")=='on') ? '1':'0',
                    "user_change_password"      =>  ($request->input("user_change_password")=='on') ? '1':'0',
                    "user_plan_video"           =>  ($request->input("user_plan_video")=='on') ? '1':'0',
                    "user_plan_pdf"             =>  ($request->input("user_plan_pdf")=='on') ? '1':'0',
                    "user_plan_view"            =>  ($request->input("user_plan_view")=='on') ? '1':'0',
                    "user_mail_support"         =>  ($request->input("user_mail_support")=='on') ? '1':'0',
                    "user_online_support"       =>  ($request->input("user_online_support")=='on') ? '1':'0',
                ]);
    
                if($insert){
                    return back()->with("success", "Successfully Inserted!!!");
                }else {
                    return back()->with("error", "There is some issue on inserting!!!");
                }
            }
        } catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }

    public function addPermissionAdminSideMenu(Request $request){
        try {
            $details= AdminSideMenu::where("id", 1)->first();
            if ($details) {
                $update = AdminSideMenu::where("id", 1)->update([
                    "dashboard"             =>  ($request->input("dashboard")=='on') ? '1':'0',
                    "all_user_list"         =>  ($request->input("all_user_list")=='on') ? '1':'0',
                    "add_new_user"          =>  ($request->input("add_new_user")=='on') ? '1':'0',
                    "user_activation"       =>  ($request->input("user_activation")=='on') ? '1':'0',
                    "kyc_management"        =>  ($request->input("kyc_management")=='on') ? '1':'0',
                    "genealogy"             =>  ($request->input("genealogy")=='on') ? '1':'0',
                    "direct_referal"        =>  ($request->input("direct_referal")=='on') ? '1':'0',
                    "binary_tree_view"      =>  ($request->input("binary_tree_view")=='on') ? '1':'0',
                    "rank_progression"      =>  ($request->input("rank_progression")=='on') ? '1':'0',
                    "earning_payout"        =>  ($request->input("earning_payout")=='on') ? '1':'0',
                    "commission_report"     =>  ($request->input("commission_report")=='on') ? '1':'0',
                    "bonus_structure"       =>  ($request->input("bonus_structure")=='on') ? '1':'0',
                    "withdrawl_request"     =>  ($request->input("withdrawl_request")=='on') ? '1':'0',
                    "payout_history"        =>  ($request->input("payout_history")=='on') ? '1':'0',
                    "add_plan"              =>  ($request->input("add_plan")=='on') ? '1':'0',
                    "view_plan"             =>  ($request->input("view_plan")=='on') ? '1':'0',
                    "sales_transaction"     =>  ($request->input("sales_transaction")=='on') ? '1':'0',
                    "product_sales"         =>  ($request->input("product_sales")=='on') ? '1':'0',
                    "payment_transactions"  =>  ($request->input("payment_transactions")=='on') ? '1':'0',
                    "subscription_plan"     =>  ($request->input("subscription_plan")=='on') ? '1':'0',
                    "promotion_marketing"   =>  ($request->input("promotion_marketing")=='on') ? '1':'0',
                    "referal_links"         =>  ($request->input("referal_links")=='on') ? '1':'0',
                    "promotional_offers"    =>  ($request->input("promotional_offers")=='on') ? '1':'0',
                    "training_materials"    =>  ($request->input("training_materials")=='on') ? '1':'0',
                    "reports_analytics"     =>  ($request->input("reports_analytics")=='on') ? '1':'0',
                    "performance_reports"   =>  ($request->input("performance_reports")=='on') ? '1':'0',
                    "sales_reports"         =>  ($request->input("sales_reports")=='on') ? '1':'0',
                    "user_activity_logs"    =>  ($request->input("user_activity_logs")=='on') ? '1':'0',
                    "mlm_plan_config"       =>  ($request->input("mlm_plan_config")=='on') ? '1':'0',
                    "commission_setting"    =>  ($request->input("commission_setting")=='on') ? '1':'0',
                    "payment_gateways"      =>  ($request->input("payment_gateways")=='on') ? '1':'0',
                    "tax_settings"          =>  ($request->input("tax_settings")=='on') ? '1':'0',
                    "user_tickets"          =>  ($request->input("user_tickets")=='on') ? '1':'0',
                    "faq_knowledge"         =>  ($request->input("faq_knowledge")=='on') ? '1':'0',
                    "contact_support"       =>  ($request->input("contact_support")=='on') ? '1':'0',
                    "admin_profile"         =>  ($request->input("admin_profile")=='on') ? '1':'0',
                ]);
    
                if($update){
                    return back()->with("success", "Successfully Updated!!!");
                }else {
                    return back()->with("error", "There is some issue on updating!!!");
                }
            }else{
                $insert= AdminSideMenu::create([
                    "dashboard"             =>  ($request->input("dashboard")=='on') ? '1':'0',
                    "all_user_list"         =>  ($request->input("all_user_list")=='on') ? '1':'0',
                    "add_new_user"          =>  ($request->input("add_new_user")=='on') ? '1':'0',
                    "user_activation"       =>  ($request->input("user_activation")=='on') ? '1':'0',
                    "kyc_management"        =>  ($request->input("kyc_management")=='on') ? '1':'0',
                    "genealogy"             =>  ($request->input("genealogy")=='on') ? '1':'0',
                    "direct_referal"        =>  ($request->input("direct_referal")=='on') ? '1':'0',
                    "binary_tree_view"      =>  ($request->input("binary_tree_view")=='on') ? '1':'0',
                    "rank_progression"      =>  ($request->input("rank_progression")=='on') ? '1':'0',
                    "earning_payout"        =>  ($request->input("earning_payout")=='on') ? '1':'0',
                    "commission_report"     =>  ($request->input("commission_report")=='on') ? '1':'0',
                    "bonus_structure"       =>  ($request->input("bonus_structure")=='on') ? '1':'0',
                    "withdrawl_request"     =>  ($request->input("withdrawl_request")=='on') ? '1':'0',
                    "payout_history"        =>  ($request->input("payout_history")=='on') ? '1':'0',
                    "add_plan"              =>  ($request->input("add_plan")=='on') ? '1':'0',
                    "view_plan"             =>  ($request->input("view_plan")=='on') ? '1':'0',
                    "sales_transaction"     =>  ($request->input("sales_transaction")=='on') ? '1':'0',
                    "product_sales"         =>  ($request->input("product_sales")=='on') ? '1':'0',
                    "payment_transactions"  =>  ($request->input("payment_transactions")=='on') ? '1':'0',
                    "subscription_plan"     =>  ($request->input("subscription_plan")=='on') ? '1':'0',
                    "promotion_marketing"   =>  ($request->input("promotion_marketing")=='on') ? '1':'0',
                    "referal_links"         =>  ($request->input("referal_links")=='on') ? '1':'0',
                    "promotional_offers"    =>  ($request->input("promotional_offers")=='on') ? '1':'0',
                    "training_materials"    =>  ($request->input("training_materials")=='on') ? '1':'0',
                    "reports_analytics"     =>  ($request->input("reports_analytics")=='on') ? '1':'0',
                    "performance_reports"   =>  ($request->input("performance_reports")=='on') ? '1':'0',
                    "sales_reports"         =>  ($request->input("sales_reports")=='on') ? '1':'0',
                    "user_activity_logs"    =>  ($request->input("user_activity_logs")=='on') ? '1':'0',
                    "mlm_plan_config"       =>  ($request->input("mlm_plan_config")=='on') ? '1':'0',
                    "commission_setting"    =>  ($request->input("commission_setting")=='on') ? '1':'0',
                    "payment_gateways"      =>  ($request->input("payment_gateways")=='on') ? '1':'0',
                    "tax_settings"          =>  ($request->input("tax_settings")=='on') ? '1':'0',
                    "user_tickets"          =>  ($request->input("user_tickets")=='on') ? '1':'0',
                    "faq_knowledge"         =>  ($request->input("faq_knowledge")=='on') ? '1':'0',
                    "contact_support"       =>  ($request->input("contact_support")=='on') ? '1':'0',
                    "admin_profile"         =>  ($request->input("admin_profile")=='on') ? '1':'0',
                ]);
    
                if($insert){
                    return back()->with("success", "Successfully Inserted!!!");
                }else {
                    return back()->with("error", "There is some issue on inserting!!!");
                }
            }
        } catch (\Exception $e) {
            \Log::error("Error fetching favicon details: " . $e->getMessage());
            return back()->with("error", "Something went wrong.".$e->getMessage());
        }
    }
}
