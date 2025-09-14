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
                                        <th>Plan Name</th>
                                        <th>Joinning Fees</th>
                                        <th>Commision Type</th>
                                        <th>Payout Method</th>
                                        <th>Min. Withdrawl Limit</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                @if ($detail->plan_name == 1)
                                                    Silver
                                                @elseif($detail->plan_name == 2)
                                                    Gold
                                                @elseif($detail->plan_name == 3)
                                                    Platinum
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->joinning_fees == 1)
                                                    One Time
                                                @elseif($detail->joinning_fees == 2)
                                                    Monthly
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->commision_type == 1)
                                                    Direct
                                                @elseif($detail->commision_type == 2)
                                                    Binary
                                                @elseif($detail->commision_type == 3)
                                                    Uni Level
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->payout_method == 1)
                                                    Bank Transfer
                                                @elseif($detail->payout_method == 2)
                                                    Wallet
                                                @elseif($detail->payout_method == 3)
                                                    UPI
                                                @endif
                                            </td>
                                            <td>
                                                {{ $detail->min_withdrawl_limit }}
                                            </td>
                                            <td>
                                                {{-- <img src="{{ $detail->self_image }}" alt="" style="width:100px;height:100px;"> --}}
                                                <img src="{{ asset('storage/documents/plan/' .$detail->image) }}" style="width:100px;height:100px;">
                                            </td>
                                            <td>
                                                @if($detail->status=="0")
                                                    In Active
                                                @elseif($detail->status=="1")
                                                    Active
                                                @elseif($detail->status=="2")
                                                    Deleted
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
                                                                    href="{{ route('edit.admin.plan', ['edit_id' => $detail->id]) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.plan.status_change', ['id' => $detail->id, 'status' => '0']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>In Active</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.plan.status_change', ['id' => $detail->id, 'status' => '1']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Active</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.plan.status_change', ['id' => $detail->id, 'status' => '2']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.plan.referal', ['plan_id' => $detail->id]) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Referal</span>
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
