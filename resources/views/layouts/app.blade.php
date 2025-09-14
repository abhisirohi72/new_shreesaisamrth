<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="Content-Security-Policy" content="frame-src 'self' https://www.youtube.com;">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('layouts.header') <!-- Include Header -->

    @if(session()->has('user')) 
        @include("layouts.user.header")
        @include("layouts.user.sidebar")
    @elseif(session()->has('admin')) 
        @include("layouts.admin.header")
        @include("layouts.admin.sidebar")
    @elseif(session()->has('developer')) 
        @include("layouts.developer.header")
        @include("layouts.developer.sidebar")    
    @endif
</head>

<body>
    @yield('content') <!-- Main Content -->
    @stack('script-push')
    @include('layouts.footer') <!-- Include Footer -->
</body>

</html>
