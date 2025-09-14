<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SupportMail;
use App\Models\FooterDetail;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\User;

class SupportController extends Controller
{
    public function __construct()
    {
        
    }

    public function mailSupport(Request $request){
        try {
            $title = "Mail Support";
            return view("user.support.mail", [
                "title"     =>  $title,
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function onlineSupport(Request $request){
        try {
            $title = "Online Mail Support";
            $receiverId = User::where("user_type", "1")->first();
            return view("user.support.online", [
                "title"         =>  $title,
                "receiverId"    =>  $receiverId->id,
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function sendMailSupport(Request $request){
        try {
            //get footer details
            $admin_email = FooterDetail::where("id", 1)->first();
            $details = [
                'title' => 'Backend Query For '.session("user")['email'].", Name= ".session("user")['name'],
                'body' => $request->input("query")
            ];

            $mail = Mail::to($admin_email->email)->send(new SupportMail($details));
            if($mail){
                return back()->with("success", "Mail Sent To Admin");
            }else{
                return back()->with("error", "There is some issue on sending email");
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }

    public function fetchMessages($userId)
    {
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $userId);
        })
        ->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)->where('receiver_id', Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $receiverId = Auth::user()->user_type == 1 ? $request->user_id : 1; // Admin gets user ID, user sends to admin

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['success' => true]);
    }
}
