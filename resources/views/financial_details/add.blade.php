@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Financial & Investment Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Financial & Investment Details</li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.financial.details') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="willing_to_invest" class="form-label">Willingness to Invest</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input 
    class="form-check-input" 
    type="checkbox" 
    id="flexSwitchCheckDefault" 
    name="willing_to_invest" 
    value="yes"
    {{ old('willing_to_invest', $details[0]->willing_to_invest ?? '') == 'yes' ? 'checked' : '' }}
>

                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="investment_range" class="form-label">Investment Range (5000- 50000 or more than)</label>
                                    <input 
    type="number" 
    class="form-control" 
    id="investment_range" 
    name="investment_range" 
    value="{{ old('investment_range', $details[0]->investment_range ?? '') }}"
>

                                </div>
                                <div class="col-12">
                                    <label for="expected_monthly_earning" class="form-label">Expected Monthly Earnings</label>
                                    <input 
    type="text" 
    class="form-control" 
    id="expected_monthly_earning" 
    name="expected_monthly_earning" 
    value="{{ old('expected_monthly_earning', $details[0]->expected_monthly_earning ?? '') }}"
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
