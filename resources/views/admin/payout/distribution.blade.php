@extends('layouts.app')

@section('title', $title)

@section('content')
    <style>
        .datatable-container {
            overflow: auto;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">User Management</li> --}}
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
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.distribution.user') }}" method="GET">
                                        <label for="part_time" class="form-label">Search by Date</label>
                                        <input type="text" id="datepicker" name="date" class="form-control" value="{{ request('date') }}" placeholder="Select Date" autocomplete="off">
                                        <div class="text-center mt-2">
                                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <h5 class="card-title">Details</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>User Email</th>
                                        <th>Unique ID</th>
                                        <th>Previous Wallet</th>
                                        <th>Current Wallet</th>
                                        <th>Reason</th>
                                        <th>Package ID</th>
                                        <th>Package Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $detail['user_id'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['user_email'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['user_unique_id'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['previous_wallet'] ?? 'N/A' }} INR</td>
                                            <td>{{ $detail['current_wallet'] ?? 'N/A' }} INR</td>
                                            <td>{{ $detail['reason'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['invst_id'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['invest_amount'] ?? 'N/A' }}</td>
                                            <td>{{ $detail['date'] ?? 'N/A' }}</td>
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
@push('script-push')
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
@endpush
