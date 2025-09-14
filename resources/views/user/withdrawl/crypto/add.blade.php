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
                            <form class="row g-3 needs-validation" method="POST"
                                action="{{ route('user.withdrawl.save.crypto') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="admin_charges" class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control" id="logo">
                                    <div class="invalid-feedback">Please, enter logo!</div>
                                    @if(filled($details) && filled($details->logo))
                                        <img src="{{ asset('storage/uploads/crypto/').'/'.$details->logo }}"  class="mt-2" style="width: 100px; height:100px;">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="admin_charges" class="form-label">QR Code Image</label>
                                    <input type="file" name="qr_code" class="form-control" id="qr_code">
                                    <div class="invalid-feedback">Please, enter qr code!</div>
                                    @if(filled($details) && filled($details->qr_code))
                                        <img src="{{ asset('storage/uploads/crypto/').'/'.$details->qr_code }}"  class="mt-2" style="width: 100px; height:100px;">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="yourName" class="form-label">Crypto Address</label>
                                    <input type="text" name="crypto_add" class="form-control" id="crypto_add"  value="{{ $details->crypto_add ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your Crypto Address!</div>
                                </div>

                                <div class="col-12">
                                    <label for="network" class="form-label">Network</label>
                                    <input type="text" name="network" class="form-control" id="network"  value="{{ $details->network ?? '' }}">
                                    <div class="invalid-feedback">Please, enter your network!</div>
                                </div>

                                <div class="col-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="1" @if(filled($details) && filled($details->status) && $details->status=="1") selected @endif>Active</option>
                                        <option value="0" @if(filled($details) && filled($details->status) && $details->status=="0") selected @endif>In Active</option>
                                    </select>
                                    <div class="invalid-feedback">Please, enter your network!</div>
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Details</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
