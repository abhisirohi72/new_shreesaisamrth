<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - ChargingBD</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    @if($page_name=="login")
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @endif    
    @if($page_name=="forgot_user")
        <link rel="stylesheet" href="{{ asset('assets/css/forgot_pass.css') }}">
    @endif
    @if($page_name=="register_user")
        <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    @endif
    @if($page_name=="u_dashboard")
        <link rel="stylesheet" href="{{ asset('assets/css/u_dashboard.css') }}">
    @endif
</head>

<body>
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
    @yield('content') <!-- Main Content -->
    @stack('script-push')
    @include('layouts.footer')
</body>

</html>
