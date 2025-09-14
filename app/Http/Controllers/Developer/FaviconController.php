<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favicon;
use Illuminate\Support\Facades\Storage;


class FaviconController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request){
        $title = "Developer Favicon & Logo Upload";
        return view("developer.favicon_upload", [
            "title"=> $title
        ]);
    }

    public function viewFavicon(Request $request){
        $title = "View Favicon & Logo Upload";
        $details= Favicon::where("id", 1)->first();
        // echo "<pre>";
        // print_r($details);
        return view("developer.view_favicon", [
            "title"     =>  $title,
            'details'   =>  $details
        ]);
    }

    public function editFavicon(Request $request){
        $title = "Edit Favicon & Logo Upload";
        $details= Favicon::where("id", 1)->first();
        // echo "<pre>";
        // print_r($details);
        return view("developer.edit_favicon", [
            "title"=> $title,
            'details'   =>  $details
        ]);
    }

    public function addFavicon(Request $request){
        return $this->saveFavicon($request);
    }

    public function saveFavicon($request){

        if (!$request->has('edit_id')) {
            $request->validate([
                "favicon"       =>  "required|image|mimes:jpg,jpeg,png|max:2048",
                "logo"          =>  "required|image|mimes:jpg,jpeg,png|max:2048",
                "backend_logo"  =>  "required|image|mimes:jpg,jpeg,png|max:2048",
            ]);
        }

        $directory = "webiste_setting";
        Storage::disk('public')->makeDirectory($directory);
        $get_details= Favicon::where("id", 1)->first();
        $favicon_name   =   $get_details->favicon;
        $logo_name      =   $get_details->logo;
        $backend_logo   =   $get_details->backend_logo;   
        // Upload favicon file
        if ($request->hasFile("favicon") && $request->file('favicon')->isValid()) {
            $file = $request->file('favicon');
            $favicon_name = "favicon_" . time() . "." . $file->extension();

            $favicon_path = $file->storeAs($directory, $favicon_name, 'public');
        }

        // Upload logo file
        if ($request->hasFile("logo") && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $logo_name = "logo_" . time() . "." . $file->extension();

            $logo_path = $file->storeAs($directory, $logo_name, 'public');
        }

        // Upload backend logo file
        if ($request->hasFile("backend_logo") && $request->file('backend_logo')->isValid()) {
            $file = $request->file('backend_logo');
            $backend_logo = "backend_logo" . time() . "." . $file->extension();

            $backend_logo_path = $file->storeAs($directory, $backend_logo, 'public');
        }
        
        if(empty($get_details)){
            $insert= Favicon::create([
                "favicon"       =>  $favicon_name,
                "logo"          =>  $logo_name,
                "backend_logo"  =>  $backend_logo ?? ''
            ]);

            if($insert){
                return back()->with("success", "Successfully Inserted!!!");
            }else{
                return back()->with("error", "There is some issue on inserting!!!");
            }
        }else{
            $update = Favicon::where("id",1)->update([
                "favicon"       =>  $favicon_name,
                "logo"          =>  $logo_name,
                "backend_logo"  =>  $backend_logo
            ]);

            if($update){
                return back()->with("success", "Successfully Updated!!!");
            }else{
                return back()->with("error", "There is some issue on updating!!!");
            }
        }
    }
}
