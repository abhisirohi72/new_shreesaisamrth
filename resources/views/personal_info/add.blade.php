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
            <h3>Personal Information</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('save.info') }}">
                    @csrf

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="full_name" 
                            name="full_name"
                            value="{{ old('full_name', $details[0]->name ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="phone" 
                            name="phone"
                            value="{{ old('phone', $details[0]->phone ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email"
                            value="{{ old('email', $details[0]->email ?? '') }}" 
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea 
                            name="address" 
                            id="address" 
                            cols="30" 
                            rows="3" 
                            class="form-control">{{ old('address', $details[0]->address ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="city" 
                            name="city"
                            value="{{ old('city', $details[0]->city ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="state">State</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="state" 
                            name="state"
                            value="{{ old('state', $details[0]->state ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="zipcode">Zipcode</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="zipcode" 
                            name="zipcode"
                            value="{{ old('zipcode', $details[0]->zipcode ?? '') }}">
                    </div>

                    <button type="submit" name="submit" class="form-btn">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
