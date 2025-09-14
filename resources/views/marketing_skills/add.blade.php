@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Marketing & Sales Skills</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Marketing & Sales Skills</li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.marketing.skill') }}">
                                @csrf
                                <h4>Social Media Presence </h4>
                                <hr>
                                <div class="col-12">
                                    <label for="fb" class="form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->fb=="yes")checked @endif name="fb">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->instagram=="yes")checked @endif name="instagram">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="linkedIn" class="form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->linkedIn=="yes")checked @endif name="linkedIn">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="whatsapp" class="form-label">WhatsApp Groups</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->whatsapp=="yes")checked @endif name="whatsapp">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <h4>Marketing Experience</h4>
                                <hr>
                                <div class="col-12">
                                    <label for="selling" class="form-label">Online/Offline Selling</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->selling=="yes")checked @endif name="selling">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="lead_generation" class="form-label">Lead Generation</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->lead_generation=="yes")checked @endif name="lead_generation">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="referal_business" class="form-label">Referral Business</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->referal_business=="yes")checked @endif name="referal_business">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="public_speaking" class="form-label">Public Speaking Skills</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="yes" @if(isset($details[0]) && $details[0]->public_speaking=="yes")checked @endif name="public_speaking">
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
