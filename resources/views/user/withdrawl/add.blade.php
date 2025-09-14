@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Withdrawls</li>
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
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>  
                                @endforeach
                            @endif
                            <form class="row g-3" method="POST" action="{{ route('save.user.withdrawl') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="details" class="form-label">Select Reciept Payment</label>
                                    <select name="details" id="details" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="usdt">Crypto</option>
                                        <option value="bank">Bank</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount">
                                </div>
                                
                                @if($details && $details->admin_charges)
                                <div class="col-12">
                                    <label for="amnt" class="form-label">Admin Charges</label>
                                    <input type="number" min="1" class="form-control" id="amnt" name="amnt" value="{{ $details->admin_charges ?? '' }}" readonly>
                                </div>
                                @endif

                                @if($details && $details->tds)
                                <div class="col-12">
                                    <label for="tds" class="form-label">TDS</label>
                                    <input type="number" min="1" class="form-control" id="tds" name="tds" value="{{ $details->tds ?? '' }}" readonly>
                                </div>
                                @endif

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection