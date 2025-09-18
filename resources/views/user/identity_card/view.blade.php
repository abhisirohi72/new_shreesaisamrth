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
            <h3>ID Card</h3>
        </div>

        <div class="list">
            <div class="card text-center">
                <style>
                    .id-card {
                        width: 320px;
                        border: 1px solid #ccc;
                        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
                        border-radius: 10px;
                        margin: 0 auto;
                        overflow: hidden;
                        background: #fff;
                        position: relative;
                    }
                    .id-card .header {
                        background: #40eafb;
                        padding: 10px;
                    }
                    .id-card .header img {
                        height: 40px;
                    }
                    .id-card .company-name {
                        background: #eee;
                        font-weight: bold;
                        padding: 5px 0;
                        font-size: 14px;
                    }
                    .id-card .photo {
                        margin: 15px auto;
                        width: 120px;
                        height: 150px;
                        border: 1px solid #aaa;
                        overflow: hidden;
                        border-radius: 6px;
                    }
                    .id-card .photo img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                    .id-card .info {
                        text-align: left;
                        padding: 0 20px;
                        font-size: 14px;
                    }
                    .id-card .footer {
                        background: #40eafb;
                        padding: 8px;
                        font-size: 12px;
                    }
                    .id-card .footer a {
                        color: #000;
                        text-decoration: underline;
                    }
                </style>

                <div class="id-card">
                    {{-- Header --}}
                    <div class="header">
                        <img src="{{ $faviconDetails ? asset('storage/webiste_setting/' . $faviconDetails->backend_logo) : asset('assets/img/logo.png') }}" alt="Logo">
                    </div>
                    <div class="company-name">
                        {{ $footerDetails->company_name }}
                    </div>

                    {{-- Photo --}}
                    <div class="photo">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile Photo">
                    </div>

                    {{-- Info --}}
                    <div class="info">
                        <p><strong>Name:</strong> {{ $details->name }}</p>
                        <p><strong>Email:</strong> {{ $details->email }}</p>
                        <p><strong>Address:</strong> {{ $details->address }}, {{ $details->city }}, {{ $details->state }} - {{ $details->zipcode }}</p>
                        <p><strong>Joining Date:</strong> {{ $details->created_at }}</p>
                    </div>

                    {{-- Footer --}}
                    <div class="footer">
                        <p>
                            Website: <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a><br>
                            Email: <a href="mailto:{{ $footerDetails->email }}">{{ $footerDetails->email }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
