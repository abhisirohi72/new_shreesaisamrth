@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Custom Branding</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Information</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Vertical Form -->
                            <form class="row g-3" method="POST" action="{{ route('footer.details.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" name="company_name" id="company_name"  class="form-control" value="{{ $details->company_name }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Facbook URL</label>
                                    <textarea name="fb_url" id="fb_url" cols="10" rows="2" class="form-control">{{ $details->fb_url ?? '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Twitter URL</label>
                                    <textarea name="twitter_url" id="twitter_url" cols="10" rows="2" class="form-control">{{ $details->twitter_url ?? '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">LinkedIN URL</label>
                                    <textarea name="linkedin_url" id="linkedin_url" cols="10" rows="2" class="form-control">{{ $details->linkedin_url ?? '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Google Plus URL</label>
                                    <textarea name="gplus_url" id="gplus_url" cols="10" rows="2" class="form-control">{{ $details->gplus_url ?? '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Instagram URL</label>
                                    <textarea name="insta_url" id="insta_url" cols="10" rows="2" class="form-control">{{ $details->insta_url ?? '' }}</textarea>
                                </div>
                                
                                <h4 class="text-primary">Contact Details</h4>
                                <hr>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $details->email ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $details->phone ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $details->address ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Office Open Time</label>
                                    <input type="text" name="office_open_time" id="office_open_time" class="form-control" placeholder="9:00 AM" value="{{ $details->office_open_time ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Office Close Time</label>
                                    <input type="text" name="office_close_time" id="office_close_time" class="form-control" placeholder="6:00 PM" value="{{ $details->office_close_time ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Footer Line</label>
                                    <input type="text" name="footer_line" id="footer_line" class="form-control" placeholder="© 2025 Workup. All rights reserved" value="{{ $details->footer_line ?? '' }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
