@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        {{-- Banner --}}
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Download official documents in PDF format</p>
            </div>
            <img src="{{ $faviconDetails ? asset('storage/webiste_setting/' . $faviconDetails->backend_logo) : asset('assets/img/logo.png') }}" 
                 alt="App Logo" style="border-radius:12px; width:100px; height:100px;">
        </div>

        {{-- Title Bar --}}
        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        {{-- Section --}}
        <div class="section">
            <div class="line"></div>
            <h3>Available Documents</h3>
        </div>

        @include("layouts.error_msg")

        {{-- PDF list --}}
        <div class="list">
            <div class="row">
                @foreach($details as $detail)
                    <div class="col-md-6 mb-4">
                        <div class="card p-3 text-center">
                            <h6 class="text-primary mb-3">{{ $detail->title }}</h6>
                            <a href="{{ route('download.pdf', ["filename"=>$detail->name]) }}" 
                               class="btn btn-sm btn-primary">
                                Download PDF
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
