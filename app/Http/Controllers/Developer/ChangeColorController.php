<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorChange;

class ChangeColorController extends Controller
{
    public function __construct()
    {
        
    }

    public function changeColor(Request $request){
        $title = "Change Colors";
        // $details= FooterDetail::where("id", 1)->first();

        return view("developer.color.add", [
            "title"     =>  $title,
            // "details"   =>  $details
        ]);
    }

    public function addChangeColor(Request $request){
        return $this->addUpdateDetails($request);
    }

    public function addUpdateDetails($request){
        $details= ColorChange::where("id", 1)->first();
        if($details){
            $update = ColorChange::where("id", 1)->update([
                "front_header"      => $request->input("front_header"),
                "front_footer"      => $request->input("front_footer"),
                "backend_header"    => $request->input("backend_header"),
                "backend_sidebar"   => $request->input("backend_sidebar"),
            ]);

            if($update){
                return back()->with("success", "Successfully Updating!!!");
            }else{
                return back()->with("error", "There is some issue on Updating!!!");
            }
        }else{
            $create = ColorChange::create([
                "front_header"      => $request->input("front_header"),
                "front_footer"      => $request->input("front_footer"),
                "backend_header"    => $request->input("backend_header"),
                "backend_sidebar"   => $request->input("backend_sidebar"),
            ]);

            if($create){
                return back()->with("success", "Successfully Inserted!!!");
            }else{
                return back()->with("error", "There is some issue on inserting!!!");
            }
        }
    }
}
