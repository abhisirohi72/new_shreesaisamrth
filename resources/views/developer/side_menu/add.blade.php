@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">Custom Branding</li> --}}
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
                            <form class="row g-3" method="POST" action="{{ route('add.user.side.menu') }}" enctype="multipart/form-data">
                                @csrf
                                <h4>User's Menu</h4>
                                <hr>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_dashboard" @if(filled($details) && ($details->user_dashboard=="1")) checked @endif name="user_dashboard" >
                                        <label class="form-check-label" for="user_dashboard">Dashboard</label>
                                    </div>
                                    <hr>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_wallet_details" name="user_wallet_details" @if(filled($details) && ($details->user_wallet_details=="1")) checked @endif>
                                        <label class="form-check-label" for="user_wallet_details">Wallet Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_payout_request" @if(filled($details) && ($details->user_payout_request=="1")) checked @endif name="user_payout_request">
                                        <label class="form-check-label" for="user_payout_request">Payout Request</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_approved_payout" @if(filled($details) && ($details->user_approved_payout=="1")) checked @endif  name="user_approved_payout">
                                        <label class="form-check-label" for="user_approved_payout">Approved Payout</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_wallet_income" @if(filled($details) && ($details->user_wallet_income=="1")) checked @endif  name="user_wallet_income">
                                        <label class="form-check-label" for="user_wallet_income">Wallet Income</label>
                                    </div>
                                    <hr>
                                    <h4>Details</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_income_details" @if(filled($details) && ($details->user_income_details=="1")) checked @endif  name="user_income_details">
                                        <label class="form-check-label" for="user_income_details">Income Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_professional_details" @if(filled($details) && ($details->user_professional_details=="1")) checked @endif  name="user_professional_details">
                                        <label class="form-check-label" for="user_professional_details">Professional Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_financial_details" @if(filled($details) && ($details->user_financial_details=="1")) checked @endif name="user_financial_details">
                                        <label class="form-check-label" for="user_financial_details">Financial & Investment Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_marketing_details" @if(filled($details) && ($details->user_marketing_details=="1")) checked @endif  name="user_marketing_details">
                                        <label class="form-check-label" for="user_marketing_details">Marketing & Sales Skills</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_availability_details" @if(filled($details) && ($details->user_availability_details=="1")) checked @endif  name="user_availability_details">
                                        <label class="form-check-label" for="user_availability_details">Availability & Commitment</label>
                                    </div>
                                    <hr>
                                    <h4>Profile Management</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_personal_info" @if(filled($details) && ($details->user_personal_info=="1")) checked @endif name="user_personal_info">
                                        <label class="form-check-label" for="user_personal_info">Personal Information</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_bank_details" @if(filled($details) && ($details->user_bank_details=="1")) checked @endif name="user_bank_details">
                                        <label class="form-check-label" for="user_bank_details">Bank Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_kyc_details" @if(filled($details) && ($details->user_kyc_details=="1")) checked @endif  name="user_kyc_details">
                                        <label class="form-check-label" for="user_kyc_details">KYC Details</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_change_password" @if(filled($details) && ($details->user_change_password=="1")) checked @endif  name="user_change_password">
                                        <label class="form-check-label" for="user_change_password">Change Password</label>
                                    </div>
                                    <hr>
                                    <h4>Plan Details</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_plan_video" @if(filled($details) && ($details->user_plan_video=="1")) checked @endif name="user_plan_video">
                                        <label class="form-check-label" for="user_plan_video">Plan Video</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_plan_pdf" @if(filled($details) && ($details->user_plan_pdf=="1")) checked @endif name="user_plan_pdf">
                                        <label class="form-check-label" for="user_plan_pdf">Plan PDF</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_plan_view" @if(filled($details) && ($details->user_plan_view=="1")) checked @endif name="user_plan_view">
                                        <label class="form-check-label" for="user_plan_view">Plan View</label>
                                    </div>
                                    <hr>
                                    <h4>Support Ticket System</h4>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_mail_support" @if(filled($details) && ($details->user_mail_support=="1")) checked @endif name="user_mail_support">
                                        <label class="form-check-label" for="user_mail_support">Mail Support</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="user_online_support" @if(filled($details) && ($details->user_online_support=="1")) checked @endif name="user_online_support">
                                        <label class="form-check-label" for="user_online_support">Online Support</label>
                                    </div>
                                    <hr>
                                    <h4>Team Details</h4>
                                    <hr>
                                    <h4>Epin Management</h4>
                                    <hr>
                                    <h4>Genelogy (Network Tree)</h4>
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
