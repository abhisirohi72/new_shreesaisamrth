<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - ChargingBD</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @if((isset($page_name)) && $page_name=="login")
        <link rel="stylesheet" href="{{ asset('public/assets/css/login.css') }}">
    @elseif((isset($page_name)) && $page_name=="forgot_user")
        <link rel="stylesheet" href="{{ asset('public/assets/css/forgot_pass.css') }}">
    @elseif((isset($page_name)) && $page_name=="register_user")
        <link rel="stylesheet" href="{{ asset('public/assets/css/register.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('public/assets/css/u_dashboard.css') }}">
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
    @if(($page_name!="login") || ($page_name!="forgot_user") || ($page_name!="register_user"))
        @include('layouts.footer')
    @endif
    @stack('script-push')
</body>

</html>
