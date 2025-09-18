@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your team details and business</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Level {{ $level }} Details</h3>
        </div>

        @include('layouts.error_msg')

        <p class="mt-2">Total Business = {{ $total_business }}</p>

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Name</th>
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>Level {{ $level }}</td>
                            <td>{{ $detail['name'] }}</td>
                            <td>{{ $detail['unique_id'] }}</td>
                            <td>{{ $detail['email'] }}</td>
                            <td>{{ $detail['investment'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
