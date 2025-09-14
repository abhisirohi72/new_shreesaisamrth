<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Popup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request) : View{
        $title = "Admin Login";
        return view("auth.admin.login", [
            "title"     =>  $title,
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
                //update login time
                User::where("id", Auth::id())->update([
                    "last_login"    =>  date("Y-m-d H:i:s")
                ]);
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }
    
            return back()->with('error', 'Invalid email or password.');
            return back()->with("error", "There is some issue in inserted or updated");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush(); // Clears session
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }

    public function magicLink(Request $request, $encrypt_data){
        $decrypt_data = Crypt::decryptString($encrypt_data);

        //check email is exist or not
        $isUserExist = User::where("email", $decrypt_data)->where("user_type", "2")->first();
        if ($isUserExist) {
            Auth::guard('web')->login($isUserExist);
            $request->session()->regenerate(); // good practice for session fixation

            if ($isUserExist->user_type == "2") {
                session(['user' => $isUserExist]);
                return redirect()->route('user.dashboard')->with('success', 'Login successful!');
            }
        }
    }

    public function changePassword(Request $request){

    }

    public function adminPopUp(Request $request){
        $title = "Admin Popup";
        return view("admin.popup.add", [
            "title"     =>  $title,
        ]);
    }

    public function addPopUp(Request $request){
        $request->validate([
            "image" =>  "required|image|mimes:jpg,jpeg,png|max:2048"
        ]);

        $directory = "documents/popup";
        Storage::disk('public')->makeDirectory($directory);

        $image_name = null;

        if ($request->hasFile("image") && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = "image_" . time() . "." . $file->extension();
            $image_path = $file->storeAs($directory, $image_name, 'public');
        }

        $isExist = Popup::where("id", 1)->first();
        if ($isExist) {
            $update = Popup::where("id", 1)->update([
                "image" =>  $image_name
            ]);
    
            if($update){
                return back()->with("success", "Records has been updated...");
            }else{
                return back()->with("error", "There is some issue on updating...");
            }
        }else{
            $insert = Popup::create([
                "image" =>  $image_name
            ]);
    
            if($insert){
                return back()->with("success", "Records has been inserted...");
            }else{
                return back()->with("error", "There is some issue on inserting...");
            }
        }
    }
}
