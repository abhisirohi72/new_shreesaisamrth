@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your video tutorials and play status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Video List</h3>
        </div>
        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $video)
                        <tr>
                            <td>{{ $video->title }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#basicModal" 
                                    data-video="{{ $video->url }}">
                                    Play Video
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Video Modal --}}
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Play Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <iframe id="videoFrame" width="100%" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <div class="text-center mt-3">
                        <button id="newButton" class="btn btn-success" style="display: none;">Eligible to level Distribution</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-push')
<script>
    $(document).ready(function() {
        let videoSrc = "";
        let timeout;

        // Open modal and set video URL
        $("#basicModal").on("show.bs.modal", function(event) {
            let button = $(event.relatedTarget);
            videoSrc = button.data("video");
            $("#videoFrame").attr("src", videoSrc + "&autoplay=1");

            $("#newButton").hide();
            timeout = setTimeout(() => {
                $("#newButton").fadeIn();
            }, 10000);
        });

        // Stop video when modal is closed
        $("#basicModal").on("hidden.bs.modal", function() {
            $("#videoFrame").attr("src", "");
            clearTimeout(timeout);
        });
    });
</script>
@endpush
