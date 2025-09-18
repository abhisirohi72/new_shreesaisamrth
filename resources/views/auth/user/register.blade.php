@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="login-container">
        <h1>Create Account</h1>
        <p>Join the future of investment</p>
        @if (session('success'))
            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> --}}
            <p style="color: #15be15;">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> --}}
            <p style="color:#eb0f0f;">{{ session('error') }}</p>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p style="color:#eb0f0f;">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('user.save.register') }}" method="post">
            @csrf
            {{-- <div class="input-group">
                <i class="ri-user-3-line"></i>
                <input type="text" id="sponsor_id" name="sponsor_id" placeholder="Sponser ID" required onkeyup="getSponsor(this.value)" value="{{ $reference ?? '' }}">
                <span id="sponsor_email" >{{ $sponsor_email[0] ?? '' }}</span>
            </div> --}}
            <div class="input-group">
                <i class="ri-user-3-line"></i>
                <input type="text" id="name" name="name" placeholder="Full Name" required>
            </div>
            <div class="input-group">
                <i class="ri-phone-line"></i>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
            </div>
            <div class="input-group">
                <i class="ri-user-3-line"></i>
                <input type="text" id="username" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="ri-git-branch-line"></i>
                <input type="text" id="referral" name="sponsor_id" placeholder="Referral Code (Optional)" onkeyup="getSponsor(this.value)" value="{{ $reference ?? '' }}">
                <span id="sponsor_email" >{{ $sponsor_email[0] ?? '' }}</span>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>

        <div class="links">
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>
@endsection
