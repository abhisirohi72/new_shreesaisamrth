@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>Invest in ChargingBD — get huge returns</h1>
                <p>Download the app from the Play Store to get started</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>
        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">Search for investments</div>
        </div>
        <div class="section">
            <div class="line"></div>
            <h3>Financial & Investment Details</h3>
        </div>
        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('save.financial.details') }}">
                    @csrf
                    <div class="form-group">
                        <label for="willing_to_invest">Willingness to Invest</label>
                        <div class="form-check form-switch">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="willing_to_invest" 
                                name="willing_to_invest" 
                                value="yes"
                                {{ old('willing_to_invest', $details[0]->willing_to_invest ?? '') == 'yes' ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="willing_to_invest">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="investment_range">Investment Range (5000 - 50000 or more)</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="investment_range" 
                            name="investment_range" 
                            value="{{ old('investment_range', $details[0]->investment_range ?? '') }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="expected_monthly_earning">Expected Monthly Earnings</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="expected_monthly_earning" 
                            name="expected_monthly_earning" 
                            value="{{ old('expected_monthly_earning', $details[0]->expected_monthly_earning ?? '') }}"
                        >
                    </div>

                    <button type="submit" name="submit" class="form-btn">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
