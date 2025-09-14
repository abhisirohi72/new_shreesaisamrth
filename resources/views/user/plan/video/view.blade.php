@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Profile Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Information</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Video.js CSS & JS -->
                            <link href="https://vjs.zencdn.net/8.0.0/video-js.css" rel="stylesheet">
                            <script src="https://vjs.zencdn.net/8.0.0/video.min.js"></script>
                            <div class="row">
                                @foreach($details as $video)
                                    <div class="col-md-6 text-center mt-4">
                                        <h6 class="text-primary">{{ $video->title }}</h6>
                                        @if($video->video_upload!="")
                                            <video class="video-js my-video-class vjs-theme-sea" controls preload="auto" style="width:100%;height:200px;">
                                                <source src="{{ asset('storage/uploads/plan_videos/' . $video->video_upload) }}" type="video/mp4">
                                            </video>
                                        @elseif($video->video_link!="")
                                            <iframe src="{{ $video->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="width: 100%;height:200px;"></iframe>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('script-push')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var players = document.querySelectorAll('.my-video-class');
        players.forEach(function (player) {
            videojs(player);
        });
    });
</script>

@endpush
