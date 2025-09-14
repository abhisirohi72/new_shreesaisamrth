@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Availability & Commitment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Availability & Commitment</li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.availability') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Part time interest</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->part_time=="yes")checked @endif name="part_time">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="full_time" class="form-label">Full time interest</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->full_time=="yes")checked @endif name="full_time">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="instagram" class="form-label">Daily Working Hours Commitment</label>
                                    <input type="number" class="form-control" id="daily_commitment" name="daily_commitment" value="{{ $details[0]->daily_commitment ?? '' }}">
                                </div>
                                <div class="col-12">
                                    <label for="target_based" class="form-label">Are you ready for Target based?</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->target_based=="yes")checked @endif name="target_based">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
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
