<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Epin;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\TransactionHistory;
use App\Models\TransferHistory;
use Illuminate\Support\Str;


class EpinController extends Controller
{
    public function __construct()
    {
        
    }

    public function addEpin(Request $request){
        $title = "Add Epin";
        return view("user.epin.add", [
            "title"     =>  $title,
        ]);
    }

    public function viewEpin(Request $request){
        $title      =   "Show Epin";
        $details    =   Epin::where("user_id", Auth::id())->get();
        
        return view("user.epin.view", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function deleteEpin($id, Request $request){
        $delete = Epin::where("id", $id)->delete();
        if($delete){
            return back()->with("success", "Delete Data Successfully..."); 
        }else{
            return back()->with("error", "There is some issue on deleting..."); 
        }
    }

    public function transferEpin($id, Request $request){
        $title = "Transfer Epin";

        $isValidEpin = Epin::where("id", $id)->where("status", "0")->first();
        $error= "";
        if(!$isValidEpin){
            $error= 'Epin is not valid...';
        }else{

            $update = Epin::where("id", $id)->update([
                "user_id"   =>  Auth::id()
            ]);

            if($update){
                //insert in transfer history
                $insert_history = TransferHistory::create([
                    "sender_id"     =>  $isValidEpin->user_id,
                    "reciever_id"   =>  Auth::id(),
                    "epin_id"       =>  $id
                ]);
                $success= "Epin has been successfully transfer...";   
            }else{
                $error = "There is some issue on updating epin";
            }
        }

        return view("user.epin.show_qrcode", [
            "title"     =>  $title,
            "error"     =>  $error,
            "success"   =>  $success
        ]);
    }

    public function createEpin(Request $request){
        return $this->addUpdateEpin($request, "add");
    }

    public function addUpdateEpin($request, $type=""){
        $request->validate([
            "qty"   =>  "required",
            "amnt"  =>  "required"
        ]);
        try {
            
            //check min wallet exist or not
            $total_amount= ($request->input("amnt")*$request->input("qty"));

            $wallet_exist = User::where("id", Auth::id())->first();
            if ($total_amount > $wallet_exist->wallet) {
                return back()->with("error", "Insufficient balance on wallet...");
            }

            $url = env('APP_URL')."/user/qr_code/";
            //  exit;

            if ($type=="add") {
                for ($counter=0; $counter <$request->input("qty") ; $counter++) { 
                    $insert= Epin::create([
                        "user_id"   =>  Auth::id(),
                        "qty"       =>  1,
                        "amnt"      =>  $request->input("amnt"),
                        "epin_name" =>  Str::uuid()
                    ]);
                    // echo "<pre>";
                    // print_r($insert);
                    // exit;
                    $main_url = $url.$insert->id;
                    $fileName = 'qrcodes/' . uniqid() . '.png'; // Unique filename
    
                    // Generate QR code and save as an image
                    $qrCode = QrCode::format('png')->size(300)->generate($main_url);
                    Storage::disk('public')->put($fileName, $qrCode);
    
                    $fullUrl = Storage::url($fileName); // Get public URL
                    Epin::where("id", $insert->id)->update([
                        "url"   =>  $fullUrl
                    ]);

                    //insert on hiostory table
                    $get_wallet = User::where("id", Auth::id())->first();
                    $current_wallet = ($get_wallet->wallet-$request->input("amnt"));
                    $insertOnTransaction = TransactionHistory::create([
                        "user_id"           =>  Auth::id(),
                        "previous_wallet"   =>  $get_wallet->wallet,
                        "current_wallet"    =>  $current_wallet,
                        "reason"            =>  "Generate Epin"
                    ]);

                    //update user Wallet
                    User::where("id", Auth::id())->update([
                        "wallet"    => $current_wallet
                    ]);
                }
                
                if($insert){
                    return back()->with("success", "Cheers!!! Your record has been inserted");
                }else{
                    return back()->with("error", "There is some issue on inserting...");
                }
            }
        } catch (\Throwable $th) {
            \Log::error("Error fetching favicon details: " . $th->getMessage());
            return back()->with("error", "Something went wrong.".$th->getMessage());
        }
    }
}
