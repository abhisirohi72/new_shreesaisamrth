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
                                .id-card {
                                    width: 300px;
                                    border: 1px solid #ccc;
                                    text-align: center;
                                    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
                                    position: relative;
                                }

                                .header-strip {
                                    height: 30px;
                                    background-color: #40eafb;
                                }

                                .clip-hole {
                                    width: 50%;
                                    height: 15px;
                                    background: #fff;
                                    border-radius: 10px;
                                    position: absolute;
                                    top: 20px;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    z-index: 2;
                                }

                                .photo-box {
                                    margin: 30px auto 15px;
                                    width: 120px;
                                    height: 150px;
                                    border: 1px solid #aaa;
                                    padding: 5px;
                                }

                                .photo-box img {
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                }

                                .info {
                                    text-align: left;
                                    padding: 0 20px;
                                    font-size: 14px;
                                }

                                .address {
                                    font-size: 12px;
                                    padding: 10px 20px;
                                    text-align: left;
                                }

                                .footer {
                                    background-color: #40eafb;
                                    color: #fff;
                                    font-size: 12px;
                                    padding: 10px;
                                    margin-top: 10px;
                                }

                                .footer a {
                                    color: #000;
                                    text-decoration: underline;
                                }

                                .footer span {
                                    color: #000;
                                }
                            </style>
                            <div class="id-card">
                                <div class="header-strip">
                                    @if ($faviconDetails)
                                        <img src="{{ asset('storage/webiste_setting/' . $faviconDetails->backend_logo) }}"
                                            alt="" style="width: 50px;height: 25px;position: relative;right: 115px;">
                                    @else
                                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="clip-hole">
                                    {{ $footerDetails->company_name }}
                                </div>

                                <div class="photo-box">
                                    <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile Photo">
                                </div>

                                <div class="info">
                                    <p><strong>Name</strong> : {{ $details->name }}</p>
                                    <p><strong>Email</strong> : {{ $details->email }}</p>
                                    <p><strong>Joining Date</strong> : {{ $details->created_at }}</p>
                                </div>

                                <div class="address">
                                    <p><strong>Address</strong> :</p>
                                    <p>
                                        {{ $details->address }}<br>
                                        {{ $details->state }}, {{ $details->city }} - {{ $details->zipcode }}
                                    </p>
                                </div>

                                <div class="footer">
                                    <span>Website:</span> <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>,
                                    <span>Email:</span> <a
                                        href="mailto:{{ $footerDetails->email }}">{{ $footerDetails->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
