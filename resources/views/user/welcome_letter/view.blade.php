@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Official details and user information</p>
            </div>
            <img src="{{ $faviconDetails ? asset('storage/webiste_setting/' . $faviconDetails->backend_logo) : asset('assets/img/logo.png') }}" 
                 alt="App Logo" style="border-radius:12px; width:100px; height:100px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Company & User Details</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <div class="p-3">
                    <h4 class="mb-3">{{ $footerDetails->company_name }}</h4>
                    <p><strong>Address:</strong> {{ $footerDetails->aaddress }}</p>
                    <p><strong>Url:</strong> <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a></p>
                    <p><strong>Email:</strong> {{ $footerDetails->email }}</p>
                    <p><strong>Phone:</strong> {{ $footerDetails->phone }}</p>

                    <hr>

                    <p>
                        Welcome to <b>{{ $footerDetails->company_name }}</b>! We're excited to have you onboard. 
                        Your journey begins here, and we're confident you'll achieve great things with us. 🌱
                    </p>

                    <div class="mt-3">
                        <p><strong>Name:</strong> {{ $details->name }}</p>
                        <p><strong>Email:</strong> {{ $details->email }}</p>
                        <p><strong>Address:</strong> {{ $details->address }}</p>
                        <p><strong>State:</strong> {{ $details->state }}</p>
                        <p><strong>City:</strong> {{ $details->city }}</p>
                        <p><strong>DOJ:</strong> {{ $details->created_at }}</p>
                    </div>

                    <hr>

                    <p>
                        For further details login on 
                        <a href="{{ env('APP_URL') }}">{{ $footerDetails->company_name }}</a> 
                        with your userid and password.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
