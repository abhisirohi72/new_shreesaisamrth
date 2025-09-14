<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function __construct()
    {
        
    }

    public function showUserChat(Request $request){
        $title = "User's Chat";
        
        $details = User::where("user_type", 2)->with('sponsor')->get();
        
        return view("admin.user.chat.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }
}
