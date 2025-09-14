@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">User Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $details->unique_id }} Banking Details</h5>
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

                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('admin.user.save.banking') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="holder_name" class="form-label">Bank Holder Name</label>
                                    <input type="text" name="holder_name" class="form-control" id="holder_name" required value="{{ $details->bankDetails[0] ->holder_name ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your holder name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" id="bank_name" required value="{{ $details->bankDetails[0]->bank_name ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your bank name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" id="account_number" required value="{{ $details->bankDetails[0]->account_number ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your account number!</div>
                                </div>

                                <div class="col-12">
                                    <label for="ifsc" class="form-label">IFSC Code</label>
                                    <input type="text" name="ifsc" class="form-control" id="ifsc" required value="{{ $details->bankDetails[0]->ifsc ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your ifsc code!</div>
                                </div>

                                <div class="col-12">
                                    <label for="google_pe" class="form-label">Google Pay</label>
                                    <input type="text" name="google_pe" class="form-control" id="google_pe" required value="{{ $details->bankDetails[0]->google_pe ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your Google Pay number!</div>
                                </div>

                                <div class="col-12">
                                    <label for="phonepe" class="form-label">Phone Pe</label>
                                    <input type="text" name="phonepe" class="form-control" id="phonepe" required value="{{ $details->bankDetails[0]->phonepe ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your Phone Pe number!</div>
                                </div>

                                <div class="col-12">
                                    <label for="paytm" class="form-label">Paytm</label>
                                    <input type="text" name="paytm" class="form-control" id="paytm" required value="{{ $details->bankDetails[0]->paytm ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your Paytm number!</div>
                                </div>

                                <input type="hidden" name="edit_id" value="{{ $details->id }}">
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Create Account</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
