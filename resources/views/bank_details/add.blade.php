@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>Add Your Bank Details — get payments faster</h1>
                <p>Provide correct details to ensure smooth transactions</p>
            </div>
            <img src="" alt="Bank Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">User Bank Details</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Bank Account Information</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('save.bank.details') }}">
                    @csrf

                    <div class="form-group">
                        <label for="holder_name">Bank Account Holder Name (As per bank records)</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="holder_name" 
                            name="holder_name"
                            value="{{ old('holder_name', $details->holder_name ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="bank_name" 
                            name="bank_name"
                            value="{{ old('bank_name', $details->bank_name ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="account_number" 
                            name="account_number"
                            value="{{ old('account_number', $details->account_number ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="ifsc">IFSC Code</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="ifsc" 
                            name="ifsc"
                            value="{{ old('ifsc', $details->ifsc ?? '') }}">
                    </div>

                    <div class="section mt-4">
                        <div class="line"></div>
                        <h3>UPI Details</h3>
                    </div>

                    <div class="form-group">
                        <label for="google_pe">Google Pay</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="google_pe" 
                            name="google_pe"
                            value="{{ old('google_pe', $details->google_pe ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="phonepe">PhonePe</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="phonepe" 
                            name="phonepe"
                            value="{{ old('phonepe', $details->phonepe ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="paytm">Paytm</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="paytm" 
                            name="paytm"
                            value="{{ old('paytm', $details->paytm ?? '') }}">
                    </div>

                    <button type="submit" class="form-btn">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
