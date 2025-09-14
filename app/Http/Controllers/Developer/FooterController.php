<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetail;

class FooterController extends Controller
{
    public function __construct()
    {
        
    }

    public function addFooterDetails(Request $request){
        $title = "Add Footer Details";
        $details= FooterDetail::where("id", 1)->first();

        return view("developer.footer.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveFooterDetails(Request $request){
       return $this->addUpdateFooterDetails($request);
    }

    public function addUpdateFooterDetails($request){
        $details= FooterDetail::where("id", 1)->first();

        if (!$details) {
            // echo "blabla"; exit;
            $request->validate([
                "company_name"          =>  "required",
                "fb_url"                =>  "required",
                "twitter_url"           =>  "required",
                "linkedin_url"          =>  "required",
                "gplus_url"             =>  "required",
                "insta_url"             =>  "required",
                "email"                 =>  "email|required",
                "phone"                 =>  "required",
                "address"               =>  "required",
                "office_open_time"      =>  "required",
                "office_close_time"     =>  "required",
                "footer_line"           =>  "required"
            ]);
            // echo "blabla"; exit;
        }

        if ($details) {
            $update = FooterDetail::where("id", 1)->update([
                "company_name"      =>  $request->input("company_name"),
                "fb_url"            =>  $request->input("fb_url"),
                "twitter_url"       =>  $request->input("twitter_url"),
                "linkedin_url"      =>  $request->input("linkedin_url"),
                "gplus_url"         =>  $request->input("gplus_url"),
                "insta_url"         =>  $request->input("insta_url"),
                "email"             =>  $request->input("email"),
                "phone"             =>  $request->input("phone"),
                "address"           =>  $request->input("address"),
                "office_open_time"  =>  $request->input("office_open_time"),
                "office_close_time" =>  $request->input("office_close_time"),
                "footer_line"       =>  $request->input("footer_line"),
            ]);

            return $update 
            ? back()->with("success", "Successfully Updated!!!") 
            : back()->with("error", "There is some issue on updating!!!");
        }else{
            $insert= FooterDetail::create([
                "company_name"      =>  $request->input("company_name"),
                "fb_url"            =>  $request->input("fb_url"),
                "twitter_url"       =>  $request->input("twitter_url"),
                "linkedin_url"      =>  $request->input("linkedin_url"),
                "gplus_url"         =>  $request->input("gplus_url"),
                "insta_url"         =>  $request->input("insta_url"),
                "email"             =>  $request->input("email"),
                "phone"             =>  $request->input("phone"),
                "address"           =>  $request->input("address"),
                "office_open_time"  =>  $request->input("office_open_time"),
                "office_close_time" =>  $request->input("office_close_time"),
                "footer_line"       =>  $request->input("footer_line"),
            ]);

            return $insert 
            ? back()->with("success", "Successfully Inserted!!!") 
            : back()->with("error", "There is some issue on inserting!!!");
        }
    }
}
