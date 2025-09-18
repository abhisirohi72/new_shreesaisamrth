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
            <h3>Marketing & Sales Skills</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('save.marketing.skill') }}">
                    @csrf

                    <h4>Social Media Presence</h4>
                    <div class="form-group">
                        <label for="fb">Facebook</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="fb" value="yes"
                                name="fb" @if(isset($details[0]) && $details[0]->fb=="yes") checked @endif>
                            <label class="form-check-label" for="fb">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="instagram" value="yes"
                                name="instagram" @if(isset($details[0]) && $details[0]->instagram=="yes") checked @endif>
                            <label class="form-check-label" for="instagram">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="linkedIn">LinkedIn</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="linkedIn" value="yes"
                                name="linkedIn" @if(isset($details[0]) && $details[0]->linkedIn=="yes") checked @endif>
                            <label class="form-check-label" for="linkedIn">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp">WhatsApp Groups</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="whatsapp" value="yes"
                                name="whatsapp" @if(isset($details[0]) && $details[0]->whatsapp=="yes") checked @endif>
                            <label class="form-check-label" for="whatsapp">Yes</label>
                        </div>
                    </div>

                    <h4 style="color: #ede617;">Marketing Experience</h4>
                    <div class="form-group">
                        <label for="selling">Online/Offline Selling</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="selling" value="yes"
                                name="selling" @if(isset($details[0]) && $details[0]->selling=="yes") checked @endif>
                            <label class="form-check-label" for="selling">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lead_generation">Lead Generation</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="lead_generation" value="yes"
                                name="lead_generation" @if(isset($details[0]) && $details[0]->lead_generation=="yes") checked @endif>
                            <label class="form-check-label" for="lead_generation">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="referal_business">Referral Business</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="referal_business" value="yes"
                                name="referal_business" @if(isset($details[0]) && $details[0]->referal_business=="yes") checked @endif>
                            <label class="form-check-label" for="referal_business">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="public_speaking">Public Speaking Skills</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="public_speaking" value="yes"
                                name="public_speaking" @if(isset($details[0]) && $details[0]->public_speaking=="yes") checked @endif>
                            <label class="form-check-label" for="public_speaking">Yes</label>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="form-btn">Submit Form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
