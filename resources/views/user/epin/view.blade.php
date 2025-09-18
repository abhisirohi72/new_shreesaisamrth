@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your E-Pin details and status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>E-Pin Details</h3>
        </div>

        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->epin_name }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>{{ $detail->amnt }}</td>
                            <td>
                                @if($detail->status=="0")
                                    <button class="btn btn-sm btn-primary">Unused</button>
                                @elseif($detail->status=="1")
                                    <button class="btn btn-sm btn-success">Used</button>
                                @else
                                    <button class="btn btn-sm btn-danger">Expired</button>
                                @endif    
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('epin.delete', ['id' => $detail->id]) }}">
                                    <i class="bi bi-pencil"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
