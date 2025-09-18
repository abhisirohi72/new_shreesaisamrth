@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your wallet transaction details and status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Wallet Transaction Details</h3>
        </div>

        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Previous Wallet</th>
                        <th>New Value</th>
                        <th>Current Wallet</th>
                        <th>Reason</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->previous_wallet }}</td>
                            <td>{{ $detail->current_wallet - $detail->previous_wallet }}</td>
                            <td>{{ $detail->current_wallet }}</td>
                            <td>{{ $detail->reason }}</td>
                            <td>{{ $detail->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
