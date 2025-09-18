@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }} — Add Crypto Withdrawl Details</h1>
                <p>Provide correct details to ensure smooth transactions</p>
            </div>
            <img src="" alt="Crypto Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Crypto Withdrawl Information</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('user.withdrawl.save.crypto') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="logo" 
                            name="logo">
                        @if(filled($details) && filled($details->logo))
                            <img src="{{ asset('storage/uploads/crypto/').'/'.$details->logo }}" class="mt-2" style="width: 100px; height:100px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="qr_code">QR Code Image</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="qr_code" 
                            name="qr_code">
                        @if(filled($details) && filled($details->qr_code))
                            <img src="{{ asset('storage/uploads/crypto/').'/'.$details->qr_code }}" class="mt-2" style="width: 100px; height:100px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="crypto_add">Crypto Address</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="crypto_add" 
                            name="crypto_add"
                            value="{{ old('crypto_add', $details->crypto_add ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="network">Network</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="network" 
                            name="network"
                            value="{{ old('network', $details->network ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select 
                            name="status" 
                            id="status" 
                            class="form-control">
                            <option value="" selected>Please Select</option>
                            <option value="1" @if(filled($details) && $details->status=="1") selected @endif>Active</option>
                            <option value="0" @if(filled($details) && $details->status=="0") selected @endif>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="form-btn">Save Details</button>
                </form>
            </div>
        </div>
    </div>
@endsection
