@extends('layouts.app')

@section('title', $title)

@section('content')
    <style>
        .datatable-container {
            overflow: auto;
        }
    </style>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">User Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>User Email</th>
                                        <th>Aadhaar Num</th>
                                        <th>Pan Card</th>
                                        <th>ID Proof</th>
                                        <th>Self Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $detail->user->email }}</td>
                                            <td>{{ $detail->aadhaar_num }}</td>
                                            <td>{{ $detail->pan_card }}</td>
                                            <td>
                                                <img src="{{ asset('storage/documents/' .$detail->user_id.'/'. $detail->id_proof) }}" alt="ID Proof" style="width:100px;height:100px;">
                                            </td>
                                            <td>
                                                {{-- <img src="{{ $detail->self_image }}" alt="" style="width:100px;height:100px;"> --}}
                                                <img src="{{ asset('storage/documents/' .$detail->user_id.'/'. $detail->self_image) }}" alt="ID Proof" style="width:100px;height:100px;">
                                            </td>
                                            <td>
                                                @if ($detail->user->kyc_status=='0')
                                                    <span class="badge bg-warning">Un Verified</span>
                                                @elseif($detail->user->kyc_status=='1')
                                                    <span class="badge bg-success">Verified</span>
                                                @elseif($detail->user->kyc_status=='2')
                                                    <span class="badge bg-danger">Pending</span>    
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="d-flex align-items-left">
                                                    <li class="nav-item dropdown pe-3" style="list-style:none">

                                                        <a class="nav-link nav-profile d-flex align-items-center pe-0"
                                                            href="#" data-bs-toggle="dropdown">
                                                            <span
                                                                class="d-none d-md-block dropdown-toggle ps-2">Action</span>
                                                        </a><!-- End Profile Iamge Icon -->

                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.user.kyc.change', ['id' => $detail->user->id, 'status' => '0']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Un Verified</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.user.kyc.change', ['id' => $detail->user->id, 'status' => '1']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Verified</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                        href="{{ route('admin.user.kyc.change', ['id' => $detail->user->id, 'status' => '2']) }}">
                                                                        <i class="bi bi-person"></i>
                                                                        <span>Pending</span>
                                                                    </a>
                                                            </li>
                                                        </ul><!-- End Profile Dropdown Items -->
                                                    </li><!-- End Profile Nav -->
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                    

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
