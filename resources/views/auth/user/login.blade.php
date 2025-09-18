@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="login-container">
        <h1>Welcome Back!</h1>
        <p>Login to your account to continue</p>
        @include("layouts.erro_msg")

        <form action="{{ route('user.login') }}" method="post">
            @csrf
            <div class="input-group">
                <i class="ri-user-3-line"></i>
                <input type="text" id="username" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <div class="links">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
            <span>|</span>
            <a href="{{ route('user.register') }}">Create Account</a>
        </div>
    </div>
@endsection
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/67fe3c369fa5f0190d08fb14/1ioshmdfs';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
