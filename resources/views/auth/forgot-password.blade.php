@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>Forgot Password?</h1>
        <p>Enter your email to reset your password</p>
        {{-- <p>Enter your phone number to reset your password</p> --}}
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
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="input-group">
                {{-- <i class="ri-phone-line"></i>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required> --}}
                <i class="ri-user-3-line"></i>
                <input type="text" id="username" name="email" placeholder="Email" required>
            </div>
            <button type="submit" class="btn">Email Password Reset Link</button>
        </form>

        <div class="links">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>
@endsection
