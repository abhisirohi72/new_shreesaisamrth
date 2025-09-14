@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Deposit Fund</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Payment Mode</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Screenshot</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                {{ ucwords($detail->payment_mode) }}
                                            </td>
                                            <td>
                                                {{ $detail->amount }}
                                            </td>
                                            <td>
                                                {{ $detail->remark }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/uploads/deposit_funds').'/'.$detail->screenshot }}" alt="" style="width: 100px;height:100px;">  
                                            </td>
                                            <td>
                                                @if($detail->status=="0")
                                                    <span class="badge bg-danger">Cancel</span>
                                                @elseif($detail->status=="1")
                                                    <span class="badge bg-success">Approved</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif    
                                            </td>
                                            {{-- <td>
                                                <ul class="d-flex align-items-left">
                                                    <li class="nav-item dropdown pe-3" style="list-style:none">

                                                        <a class="nav-link nav-profile d-flex align-items-center pe-0"
                                                            href="#" data-bs-toggle="dropdown">
                                                            <span
                                                                class="d-none d-md-block dropdown-toggle ps-2">Action</span>
                                                        </a><!-- End Profile Iamge Icon -->

                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                                            @if($detail->status=="1")
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center"
                                                                        href="{{ route('deposit.fund', ['edit_id' => $detail->id]) }}">
                                                                        <i class="bi bi-person"></i>
                                                                        <span>Approved</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                            @endif
                                                        </ul><!-- End Profile Dropdown Items -->
                                                    </li><!-- End Profile Nav -->
                                                </ul>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
