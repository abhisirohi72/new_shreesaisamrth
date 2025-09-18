@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your withdrawl transactions and status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Withdrawl Details</h3>
        </div>

        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Admin Charges</th>
                        <th>TDS</th>
                        <th>Final Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->amount }}</td>
                            <td>{{ $detail->admin_charge }}</td>
                            <td>{{ $detail->tds }}</td>
                            <td>{{ $detail->f_amount }}</td>
                            <td>
                                @if($detail->status=="0")
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($detail->status=="1")
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Deleted</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
