<?php
namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Admin Chat View
    public function adminChat()
    {
        $title = "Chat View";
        $all_users = User::where("user_type", "2")->get();
        $chat_details= Message::where("sender_id", $all_users[0]->id)->orWhere("receiver_id", $all_users[0]->id)->get();
        // echo "<pre>";
        // print_r($chat_details);
        // exit;
        return view('admin.user.chat.view', [
            "title"         =>  $title,
            "all_users"     =>  $all_users,
            "chat_details"  =>  $chat_details
        ]);
    }

    // User Chat View
    public function userChat()
    {
        $title = "Chat View";
        $chat_details= Message::where("sender_id", Auth::id())->orWhere("receiver_id", Auth::id())->get();
        return view('user.support.online',[
            "title" =>  $title,
            "chat_details"  =>  $chat_details
        ]);
    }

    // Fetch Messages (For Both Admin & User)
    public function fetchMessages()
    {
        return Message::where(function ($query) {
            $query->where("sender_id", Auth::id())
                  ->orWhere("receiver_id", Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();    
    }

    public function showMessages($user_id, Request $request){
        return Message::where(function ($query) use ($user_id){
            $query->where("sender_id", $user_id)
                  ->orWhere("receiver_id", $user_id);
        })
        ->orderBy('created_at', 'asc')
        ->get();
    }

    // Send Message (For Both Admin & User)
    public function sendMessage(Request $request)
    {
        $send_array = [
            'sender_id'     =>  Auth::id(),
            'message' => $request->message
        ];
        if (filled(session("user"))) {
            //get admin id
            $get_admin_id= User::where("user_type", "1")->first();
            $receiver_id= $get_admin_id->id;
        }else{
            $receiver_id= $request->input("send_user_id") ?? '1';
        }
        $send_array["receiver_id"] =  $receiver_id;
        // echo "<pre>";
        // print_r($send_array);
        // exit;
        $message = Message::create($send_array);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['status' => 'Message Sent!']);
    }
}
