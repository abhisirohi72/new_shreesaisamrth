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
            <h3>Team Details</h3>
        </div>

        @include('layouts.error_msg')

        <p class="mt-2">Total Business = {{ $total_business }}</p>

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Total Member</th>
                        <th>Total Business</th>
                        <th>Member List</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail['level'] }}</td>
                            <td>{{ $detail['total'] }}</td>
                            <td>{{ $detail['investment'] }}</td>
                            <td>
                                @php
                                    $user_ids = $detail['ids']->isNotEmpty() ? implode(',', $detail['ids']->toArray()) : '0';
                                @endphp
                                <a href="{{ route('user.level.list', ['level' => $detail['level'], 'user_ids' => $user_ids]) }}" class="btn btn-sm btn-primary">Show List</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
