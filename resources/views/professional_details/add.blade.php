@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Professional Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Professional Details</li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.info') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="current_occupation" class="form-label">Current Occupation</label>
                                    <input type="text" class="form-control" id="current_occupation" name="current_occupation" value="{{ old('current_occupation', $details[0]->current_occupation ?? '') }}">
                                </div>
                                <div class="col-12">
                                    <label for="previous_mlm_exp" class="form-label">Previous MLM Experience</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                id="flexSwitchCheckDefault" 
                                                value="yes" 
                                                name="previous_mlm_exp"
                                                {{ (isset($details[0]) && $details[0]->previous_mlm_exp == "yes") ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="company_name" class="form-label">If Yes, Company Name</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="company_name" 
                                    name="company_name"
                                    value="{{ old('company_name', $details[0]->company_name ?? '') }}"
                                >
                                
                                </div>
                                <div class="col-12">
                                    <label for="network_size" class="form-label">If Exp, Network Size</label>
                                    <input 
    type="text" 
    class="form-control" 
    id="network_size" 
    name="network_size" 
    value="{{ old('network_size', $details[0]->network_size ?? '') }}"
>

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
