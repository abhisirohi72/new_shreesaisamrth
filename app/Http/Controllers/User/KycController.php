<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\ProfessionalDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Marketing;
use App\Models\BankDetail;
use App\Models\KycDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class KycController extends Controller
{
    public function __construct() {}

    public function addKYC(Request $request): View
    {
        $title = "Add KYC Details";

        $details = KycDetail::where("user_id", Auth::id())->get();
        // echo "<pre>";
        // print_r($details);
        // exit;
        return view("kyc.add", [
            "title"     =>  $title,
            "details"   =>  $details
        ]);
    }

    public function saveKycDetails(Request $request): RedirectResponse
    {
        try {
            $validation_array = [
                "aadhaar_num"    => "required",
                "pan_card"       => "required",
            ];

            $getDetails = KycDetail::where("user_id", Auth::id())->first();
            $user_id = Auth::id();

            // Define storage directory
            $directory = "documents/{$user_id}";
            Storage::disk('public')->makeDirectory($directory);

            if ($getDetails) {
                
                if ($request->hasFile("voter_or_passport") && $request->file('voter_or_passport')->isValid()) {
                    $file = $request->file('voter_or_passport');
                    $fileName = "voter_or_passport_" . time() . "." . $file->extension();

                    $voter_or_passport_path = $file->storeAs($directory, $fileName, 'public');
                    Log::info("Voter or Passport stored at: " . $voter_or_passport_path);

                    $file_name =  $fileName;
                }else{
                    $file_name = $getDetails->id_proof;
                }

                // Upload self_image file
                if ($request->hasFile("self_image") && $request->file('self_image')->isValid()) {
                    $file = $request->file('self_image');
                    $self_image_name = "self_image_" . time() . "." . $file->extension();

                    $self_image_path = $file->storeAs($directory, $self_image_name, 'public');
                    Log::info("Self Image stored at: " . $self_image_path);
                    $self_image = $self_image_name;
                }else{
                    $self_image = $getDetails->self_image;
                }

                $update_array= [
                    "aadhaar_num"   => $request->input("aadhaar_num"),
                    "pan_card"      => $request->input("pan_card"),
                    "id_proof"      => $file_name,
                    "self_image"    => $self_image
                ];
                
                $update = KycDetail::where("user_id", Auth::id())->update($update_array);

                if ($update) {
                    return back()->with("success", "Successfully Updated!!!");
                }
            } else {
                $validation_array = [
                    "voter_or_passport" => "required|image|mimes:jpg,jpeg,png|max:2048",
                    "self_image"        => "required|image|mimes:jpg,jpeg,png|max:2048",
                ];

                $request->validate($validation_array);
                $user_id = Auth::id();

                // Define storage directory
                $directory = "documents/{$user_id}";
                Storage::disk('public')->makeDirectory($directory);

                $voter_or_passport_path = null;
                $self_image_path = null;

                // Upload voter_or_passport file
                if ($request->hasFile("voter_or_passport") && $request->file('voter_or_passport')->isValid()) {
                    $file = $request->file('voter_or_passport');
                    $fileName = "voter_or_passport_" . time() . "." . $file->extension();

                    $voter_or_passport_path = $file->storeAs($directory, $fileName, 'public');
                    Log::info("Voter or Passport stored at: " . $voter_or_passport_path);
                }

                // Upload self_image file
                if ($request->hasFile("self_image") && $request->file('self_image')->isValid()) {
                    $file = $request->file('self_image');
                    $self_image_name = "self_image_" . time() . "." . $file->extension();

                    $self_image_path = $file->storeAs($directory, $self_image_name, 'public');
                    Log::info("Self Image stored at: " . $self_image_path);
                }

                // Insert record into KycDetail
                $create = KycDetail::create([
                    "user_id"       => $user_id,
                    "aadhaar_num"   => $request->input("aadhaar_num"),
                    "pan_card"      => $request->input("pan_card"),
                    "id_proof"      => $fileName,
                    "self_image"    => $self_image_name,
                ]);

                if ($create) {
                    return back()->with("success", "Successfully Inserted!!!");
                }
            }

            return back()->with("error", "There is some issue in inserted or updated");
        } catch (\Exception $exception) {
            Log::error("Error in saveKycDetails: " . $exception->getMessage());
            return back()->with("error", "An error occurred: " . $exception->getMessage());
        }
    }
}
