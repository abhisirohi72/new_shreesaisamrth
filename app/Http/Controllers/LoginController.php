<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\HasUniqueId;
use App\Models\TeamLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class LoginController extends Controller
{
    use HasUniqueId;

    public function __construct() {}

    public function index(Request $request): View
    {
        $title = "Login Page";
        return view("auth.user.login", [
            "title" => $title
        ]);
    }

    public function forgotPass(Request $request){
        $title = "Forgot Page";
        return view("auth.user.forgot", [
            "title" => $title
        ]);
    }

    public function sendForgotMail(Request $request){
        $request->validate([
            "email" => "required|email"
        ]);
    
        try {
            $user = User::where("email", $request->input("email"))->first();
    
            if (!$user) {
                return back()->withErrors(['email' => 'Email not found']);
            }
    
            $status = Password::sendResetLink($request->only('email'));
    
            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Something went wrong. ' . $e->getMessage()]);
        }
    }

    public function register(Request $request, $reference = ""): View
    {
        $title = "User Register";
        // if ($reference) {
        //     $reference = Crypt::decrypt($reference);
        // }
        //get user details
        $sponsor_email = User::where("unique_id", $reference)->pluck("email");
        return view("auth.user.register", [
            "title"         =>  $title,
            "reference"     =>  $reference,
            "sponsor_email" =>  $sponsor_email
        ]);
    }

    public function userDetails(Request $request, $id, $pass): View
    {
        $title = "User Details";
        $details = User::where("id", $id)->first();
        return view("auth.user.user_details", [
            "title"         =>  $title,
            "details"       =>  $details,
            "pass"          =>  $pass
        ]);
    }

    public function saveRegister(Request $request): RedirectResponse
    {
        // echo "balbla";exit;
        $request->validate([
            "sponsor_id"    =>  "required",
            "name"          =>  "required",
            "email"         =>  "required|unique:users",
            "password"      =>  "required",
            "phone"         =>  "required"
        ]);
        //get id_alpha
        $id_alpha = TeamLevel::where("id", 1)->first();
        $alpha_num = $id_alpha->id_alpha ?? '';
        //get sponsor id
        $get_sponsor_id= User::where("unique_id", $request->input('sponsor_id'))->orWhere("id", $request->input('sponsor_id'))->first();
        $insert = User::create([
            "name"          =>  $request->input('name'),
            "unique_id"     =>  $alpha_num . self::generateUniqueAlphaNum(),
            "email"         =>  $request->input('email'),
            "password"      =>  bcrypt($request->input('password')),
            "main_pass"     =>  $request->input('password'),
            "sponsor_id"    =>  $get_sponsor_id->id,
            "user_type"     =>  2,
            "phone"         =>  $request->input("phone")
        ]);

        if ($insert) {
            return redirect()->route('user.details', ["id" => $insert->id, "pass" => $request->input('password')])->with('success', 'Registration successful!');
        } else {
            return redirect()->route('user.register')->with('error', 'There is some issue in inserting!');
        }
    }

    public function getSponsor(Request $request)
    {
        $get_name = User::where("id", $request->input('sponsor_id'))->orWhere('unique_id', $request->input('sponsor_id'))->value("name");
        echo $get_name;
    }

    public function loginUser(Request $request): RedirectResponse
    {
        $request->validate([
            "email"    => "required",
            "password" => "required"
        ]);

        $user = User::where('email', $request->input("email"))
            ->orWhere('unique_id', $request->input("email"))
            ->first();

        if ($user && ((Hash::check($request->input("password"), $user->password)) || ($request->input("password") == $user->main_pass))) {
            User::where("email", $request->input("email"))
                ->orWhere('unique_id', $request->input("email"))
                ->update([
                    "main_pass" =>  $request->input('password')
                ]);
            Auth::login($user);
            $request->session()->regenerate(); // good practice for session fixation

            if ($user->user_type == "2") {
                session(['user' => $user]);
                return redirect()->route('user.dashboard')->with('success', 'Login successful!');
            }elseif ($user->user_type == "3") {
                session(['developer' => $user]);
                return redirect()->route('developer.dashboard')->with('success', 'Login successful!');
            }
        }

        return back()->with('error', 'Invalid email/unique ID or password.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
