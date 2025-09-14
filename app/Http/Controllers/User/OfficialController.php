<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficialController extends Controller
{
    public function __construct()
    {
        
    }

    public function welcomeLetter(Request $request){
        $title = "Welcome Letter";
        $details = Auth::user();
        return view("user.welcome_letter.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function identityCard(Request $request){
        $title = "Identity Card";
        $details = Auth::user();
        return view("user.identity_card.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }
}
