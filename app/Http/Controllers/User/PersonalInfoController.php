<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonalInfoController extends Controller
{
    public function __construct()
    {
        
    }

    public function addPersonalInfo(Request $request) : View{
        $title = "Add Personal Info";

        $details= User::where("id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("personal_info.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function changePassword(Request $request) : View{
        $title = "Change Password";

        $details= User::where("id", Auth::id())->get();
        return view("personal_info.change_password", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveInfo(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "full_name" =>  "required",
                "phone"     =>  "required",
                "address"   =>  "required",
                "city"      =>  "required",
                "state"     =>  "required",
                "zipcode"   =>  "required"
            ]);

            $update = User::where("id", Auth::id())->update([
                "name"      =>  $request->input("full_name"),
                "phone"     =>  $request->input("phone"),
                "address"   =>  $request->input("address"),
                "city"      =>  $request->input("city"),
                "state"     =>  $request->input("state"),
                "zipcode"   =>  $request->input("zipcode")
            ]);

            if ($update) {
                return back()->with("success", "Successfully Updated!!!");
            }

            return back()->with("error", "There is some issue in updated");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                "old_password"      =>  "required",
                "new_password"      =>  "required",
                "confirm_password"  =>  "required|same:new_password",
            ]);

            $user = Auth::user(); // Get the logged-in user

            // Verify old password
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['error' => 'The old password is incorrect.']);
            }
            $user->main_pass=$request->new_password;
            // Hash and update the new password
            $user->password = bcrypt($request->new_password); // You can also use Hash::make()
            $user->save();

            return back()->with('success', 'Password updated successfully.');
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }
    }
}
