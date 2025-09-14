@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Withdrawl Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Details</h5>
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
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>  
                                @endforeach
                            @endif
                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('admin.withdrawl.save') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="admin_charges" class="form-label">Admin Charges</label>
                                    <input type="text" name="admin_charges" class="form-control" id="admin_charges"  value="{{ $details->admin_charges ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your Admin Charges!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourName" class="form-label">TDS Charges</label>
                                    <input type="number" name="tds" class="form-control" id="tds"  placeholder="Enter in percentage" value="{{ $details->tds ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your TDS Charges!</div>
                                </div>
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
