@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }} </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">{{ $title }} </li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.admin.plan') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Plan Name</label>
                                    <select name="plan_name" id="plan_name" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="1" @if(!empty($details) && $details->plan_name=="1") selected='selected' @endif >Silver</option>
                                        <option value="2" @if(!empty($details) && $details->plan_name=="2") selected='selected' @endif >Gold</option>
                                        <option value="3" @if(!empty($details) && $details->plan_name=="3") selected='selected' @endif >Platinum</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Plan Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @if(!empty($details))
                                        <img src="{{ asset('storage/documents/plan/'.$details->image) }}" alt="" style="width:100px; height:100px;">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Joinning Fees</label>
                                    <select name="joinning_fees" id="joinning_fees" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="1" @if(!empty($details) && $details->joinning_fees=="1") selected='selected' @endif >One Time</option>
                                        <option value="2" @if(!empty($details) && $details->joinning_fees=="2") selected='selected' @endif >Monthly</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Commision Type</label>
                                    <select name="commision_type" id="commision_type" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="1" @if(!empty($details) && $details->commision_type=="1") selected='selected' @endif >Direct</option>
                                        <option value="2" @if(!empty($details) && $details->commision_type=="2") selected='selected' @endif >Binary</option>
                                        <option value="3" @if(!empty($details) && $details->commision_type=="3") selected='selected' @endif >Uni Level</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Payout Method</label>
                                    <select name="payout_method" id="payout_method" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        <option value="1" @if(!empty($details) && $details->payout_method=="1") selected='selected' @endif >Bank Transfer</option>
                                        <option value="2" @if(!empty($details) && $details->payout_method=="2") selected='selected' @endif >Wallet</option>
                                        <option value="3" @if(!empty($details) && $details->payout_method=="3") selected='selected' @endif >UPI</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Min. Withdrawl Limit</label>
                                    <input type="number" class="form-control" id="min_withdrawl_limit" name="min_withdrawl_limit" value="{{ $details->min_withdrawl_limit ?? '' }}">
                                </div>

                                <div class="text-center">
                                    @if(!empty($details))
                                        <input type="hidden" name="edit_id" value="{{ $details->id }}">
                                        <input type="hidden" name="old_image" value="{{ $details->image }}">
                                    @endif
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
