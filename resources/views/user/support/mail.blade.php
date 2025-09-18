@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Submit your support queries here</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Submit Support Ticket</h3>
        </div>

        @include('layouts.error_msg')

        <form class="row g-3 mt-2" method="POST" action="{{ route('save.mail.support') }}">
            @csrf
            <div class="col-12">
                <label for="query" class="form-label">Your Query</label>
                <textarea class="form-control" id="query" name="query" rows="5"></textarea>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
@endsection
