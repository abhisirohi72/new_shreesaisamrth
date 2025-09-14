@extends('layouts.app')

@section('title', $title)

@section('content')
    <style>
        .datatable-container {
            overflow: auto;
        }
    </style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Official</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
                            <style>
                                body {
                                    margin: 0;
                                    font-family: Arial, sans-serif;
                                    background-color: #40eafb;
                                    color: #222;
                                }

                                .container {
                                    padding: 20px 40px;
                                }

                                h1 {
                                    text-align: center;
                                    margin-bottom: 10px;
                                }

                                hr {
                                    border: none;
                                    height: 1px;
                                    background-color: #fff;
                                    margin-bottom: 20px;
                                }

                                .top-section {
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: flex-start;
                                    flex-wrap: wrap;
                                }

                                .contact-info {
                                    max-width: 70%;
                                }

                                .contact-info p,
                                .user-info p,
                                .message,
                                .footer {
                                    margin: 8px 0;
                                }

                                .logo img {
                                    width: 100px;
                                    height: 100px;
                                }

                                a {
                                    color: #0645AD;
                                    text-decoration: none;
                                }

                                a:hover {
                                    text-decoration: underline;
                                }

                                .message,
                                .footer {
                                    margin-top: 30px;
                                }
                            </style>
                            <div class="container">
                                <h1>{{ $footerDetails->company_name }}</h1>
                                <hr>
                                <div class="top-section">
                                    <div class="contact-info">
                                        <p><strong>Address</strong> : {{ $footerDetails->aaddress }}</p>
                                        <p><strong>Url</strong> : <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>
                                        </p>
                                        <p><strong>Email</strong> : {{ $footerDetails->email }}</p>
                                        <p><strong>Phone</strong> : {{ $footerDetails->phone }}</p>
                                    </div>
                                    <div class="logo">
                                        @if ($faviconDetails)
                                            <img src="{{ asset('storage/webiste_setting/' . $faviconDetails->backend_logo) }}"
                                                alt="" style="width: 100px; height: 100px;">
                                        @else
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <p class="message">
                                    Welcome to {{ $footerDetails->company_name }}! We're excited to have you onboard. Your journey begins here, and we're confident you'll achieve great things with us. Let's grow together! 🌱
                                </p>
                                <div class="user-info">
                                    <p><strong>Name</strong> : {{ $details->name }}</p>
                                    <p><strong>Email</strong> : {{ $details->email }}</p>
                                    <p><strong>Address</strong> : {{ $details->address }}</p>
                                    <p><strong>State</strong> : {{ $details->state }}</p>
                                    <p><strong>City</strong> : {{ $details->city }}</p>
                                    <p><strong>DOJ</strong> : {{ $details->created_at }}</p>
                                </div>

                                
                                <p class="footer">
                                    For further details login on <a
                                        href="{{ env('APP_URL') }}">{{ $footerDetails->company_name }}</a> with your
                                    userid and password.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
