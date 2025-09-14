@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>KYC Details </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">KYC Details </li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.kyc.details') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Aadhaar Card</label>
                                    <input type="text" class="form-control" id="aadhaar_num" name="aadhaar_num" value="{{ $details[0]->aadhaar_num ?? '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Pan Card</label>
                                    <input type="text" class="form-control" id="pan_card" name="pan_card" value="{{ $details[0]->pan_card ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Voter ID / Passport / Aadhaar Card (Alternative ID Proof)
                                    </label>
                                    <input type="file" class="form-control" id="voter_or_passport" name="voter_or_passport" accept=".jpg,.jpeg,.png">
                                    @if(isset($details[0]) && filled($details[0]->id_proof))
                                        <img src="{{ asset('storage/documents/'.auth()->user()->id.'/'. $details[0]->id_proof) }}" alt="" style="width:100px; height:100px;">
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Self Image</label>
                                    <input type="file" class="form-control" id="self_image" name="self_image" accept=".jpg,.jpeg,.png">
                                    @if(isset($details[0]) && filled($details[0]->self_image))
                                    <img src="{{ asset('storage/documents/'.auth()->user()->id.'/'. $details[0]->self_image) }}" alt="" style="width:100px; height:100px;">
                                    @endif
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
