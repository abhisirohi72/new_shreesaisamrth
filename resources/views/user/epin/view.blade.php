@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Epin Management</li>
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
                                            <td>
                                                {{ $detail->epin_name }}
                                            </td>
                                            <td>
                                                {{ $detail->qty }}
                                            </td>
                                            <td>
                                                {{ $detail->amnt }}
                                            </td>
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
                                                <a class="btn btn-sm btn-primary" href="{{ route('epin.delete', ['id' => $detail->id]) }}"> <i class="bi bi-pencil"></i> <span>Delete</span> </a>
                                            </td>
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
