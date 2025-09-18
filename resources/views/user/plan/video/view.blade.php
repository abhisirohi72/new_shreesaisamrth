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
                <p>Watch profile management tutorial videos</p>
            </div>
            <img src="{{ $faviconDetails ? asset('storage/webiste_setting/' . $faviconDetails->backend_logo) : asset('assets/img/logo.png') }}" 
                 alt="App Logo" style="border-radius:12px; width:100px; height:100px;">
        </div>

        {{-- Title bar --}}
        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        {{-- Section --}}
        <div class="section">
            <div class="line"></div>
            <h3>Video Tutorials</h3>
        </div>

        {{-- Error/Success Messages --}}
        @include("layouts.error_msg")

        {{-- Video list --}}
        <div class="list">
            <div class="row">
                @foreach($details as $video)
                    <div class="col-md-6 mb-4">
                        <div class="card p-3 text-center">
                            <h6 class="text-primary mb-3">{{ $video->title }}</h6>

                            @if($video->video_upload!="")
                                {{-- Local uploaded video --}}
                                <video class="video-js my-video-class vjs-theme-sea" controls preload="auto" style="width:100%; height:220px; border-radius:10px;">
                                    <source src="{{ asset('storage/uploads/plan_videos/' . $video->video_upload) }}" type="video/mp4">
                                </video>
                            @elseif($video->video_link!="")
                                {{-- External link (YouTube, Vimeo, etc.) --}}
                                <iframe src="{{ $video->video_link }}" 
                                        title="Video player" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        allowfullscreen 
                                        style="width:100%; height:220px; border-radius:10px;">
                                </iframe>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('script-push')
    {{-- Video.js CSS & JS --}}
    <link href="https://vjs.zencdn.net/8.0.0/video-js.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/8.0.0/video.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var players = document.querySelectorAll('.my-video-class');
            players.forEach(function (player) {
                videojs(player);
            });
        });
    </script>
@endpush
