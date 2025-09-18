@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>Invest in ChargingBD — get huge returns</h1>
                <p>Download the app from the Play Store to get started</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>
        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">Search for investments</div>
        </div>
        <div class="section">
            <div class="line"></div>
            <h3>Add Information</h3>
        </div>
        <div class="list">
            <div class="card">
                @include("layouts.error_msg")
                <form style="width: 100%;" method="POST" action="{{ route('save.info') }}">
                    @csrf
                    <div class="form-group">
                        <label for="text-input">Current Occupation</label>
                        <input type="text" class="form-control" id="current_occupation" name="current_occupation" value="{{ old('current_occupation', $details[0]->current_occupation ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="number-input">Previous MLM Experience</label>
                        <input class="form-check-input" type="checkbox" value="yes" name="previous_mlm_exp" {{ (isset($details[0]) && $details[0]->previous_mlm_exp == "yes") ? 'checked' : '' }}>
                    </div>
                    <div class="form-group">
                        <label for="text-input">If Yes, Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $details[0]->company_name ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label for="text-input">If Exp, Network Size</label>
                        <input type="text" class="form-control" id="network_size" name="network_size" value="{{ old('network_size', $details[0]->network_size ?? '') }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="document-input">Upload Document</label>
                        <input type="file" id="document-input" class="form-control">
                    </div> --}}
                    <button type="submit" name="submit" class="form-btn">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
