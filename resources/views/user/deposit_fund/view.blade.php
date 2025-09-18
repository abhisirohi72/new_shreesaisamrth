@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your deposit fund details and status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Deposit Fund Details</h3>
        </div>
        @include('layouts.error_msg')
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Payment Mode</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th>Screenshot</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ ucwords($detail->payment_mode) }}</td>
                            <td>{{ $detail->amount }}</td>
                            <td>{{ $detail->remark }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/deposit_funds') . '/' . $detail->screenshot }}"
                                    alt="screenshot" style="width: 100px; height:100px; border-radius:8px;">
                            </td>
                            <td>
                                @if ($detail->status == '0')
                                    <span class="badge bg-danger">Cancel</span>
                                @elseif($detail->status == '1')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
