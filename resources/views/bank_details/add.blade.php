@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User Bank Details </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">User Bank Details </li>
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
                            <!-- Vertical Form -->
                            <form class="row g-3" method="POST" action="{{ route('save.bank.details') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Bank Account Holder Name (As per bank records)</label>
                                    <input type="text" class="form-control" id="holder_name" name="holder_name" value="{{ $details->holder_name ?? '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $details->bank_name ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Account Number
                                    </label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $details->account_number ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">IFSC Code
                                    </label>
                                    <input type="text" class="form-control" id="ifsc" name="ifsc" value="{{ $details->ifsc ?? '' }}">
                                </div>
                                <h4>UPI ID</h4>
                                <hr>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Google Pe</label>
                                    <input type="text" class="form-control" id="google_pe" name="google_pe" value="{{ $details->google_pe ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Phone Pe</label>
                                    <input type="text" class="form-control" id="phonepe" name="phonepe" value="{{ $details->phonepe ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Paytm</label>
                                    <input type="text" class="form-control" id="paytm" name="paytm" value="{{ $details->paytm ?? '' }}">
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
