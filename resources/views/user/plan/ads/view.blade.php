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
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Ttitle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $video)
                                        <tr>
                                            <td>
                                                {{ $video->title }}
                                            </td>
                                            <td>
                                                {{-- <button class="btn btn-sm btn-primary" onclick="modalOpen()">View</button> --}}
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal"
                                                    data-video="{{ $video->url }}">
                                                    Play Video
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <div class="col-md-6 text-center mt-4">
                                        <h6 class="text-primary">{{ $video->title }}</h6>
                                            <iframe src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="width: 100%;height:200px;"></iframe>
                                    </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Basic Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="videoFrame" width="100%" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="text-center mt-3">
                        <button id="newButton" class="btn btn-success" style="display: none;">Eligible to level Distribution</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
@endsection
@push('script-push')
    <script>
        $(document).ready(function() {
            let videoSrc = "";
            let timeout;

            // Open modal and set video URL
            $("#basicModal").on("show.bs.modal", function(event) {
                let button = $(event.relatedTarget); // Button that triggered the modal
                videoSrc = button.data("video"); // Get the video URL from data attribute
                $("#videoFrame").attr("src", videoSrc + "&autoplay=1"); // AutoPlay Video

                // Hide button initially
                $("#newButton").hide();
                
                // Show the button after 10 seconds
                timeout = setTimeout(() => {
                    $("#newButton").fadeIn();
                }, 10000);
            });

            // Stop video when modal is closed
            $("#basicModal").on("hidden.bs.modal", function() {
                $("#videoFrame").attr("src", ""); // Remove video URL to stop playback
                clearTimeout(timeout); // Clear timeout to avoid unexpected behavior
            });
        });
    </script>
@endpush
