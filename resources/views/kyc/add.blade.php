@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }} — Add KYC Details</h1>
                <p>Provide correct details to verify your account</p>
            </div>
            <img src="" alt="KYC Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>KYC Information</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('save.kyc.details') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="aadhaar_num">Aadhaar Card Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="aadhaar_num" 
                            name="aadhaar_num"
                            value="{{ old('aadhaar_num', $details[0]->aadhaar_num ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="pan_card">PAN Card Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="pan_card" 
                            name="pan_card"
                            value="{{ old('pan_card', $details[0]->pan_card ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="voter_or_passport">Voter ID / Passport / Aadhaar (Alternative ID Proof)</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="voter_or_passport" 
                            name="voter_or_passport" 
                            accept=".jpg,.jpeg,.png">
                        @if(isset($details[0]) && filled($details[0]->id_proof))
                            <img src="{{ asset('storage/documents/'.auth()->user()->id.'/'. $details[0]->id_proof) }}" 
                                 class="mt-2" 
                                 style="width: 100px; height:100px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="self_image">Self Image</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="self_image" 
                            name="self_image" 
                            accept=".jpg,.jpeg,.png">
                        @if(isset($details[0]) && filled($details[0]->self_image))
                            <img src="{{ asset('storage/documents/'.auth()->user()->id.'/'. $details[0]->self_image) }}" 
                                 class="mt-2" 
                                 style="width: 100px; height:100px;">
                        @endif
                    </div>

                    <button type="submit" class="form-btn">Save KYC Details</button>
                </form>
            </div>
        </div>
    </div>
@endsection
