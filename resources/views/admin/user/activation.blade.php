@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Activation & Verification</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">User Management</li>
                    <li class="breadcrumb-item active">User Activation & Verification</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Details</h5>
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

                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{ route('admin.user.save') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="user_details" class="form-label">Select Users</label>
                                    <select name="user_details" id="user_details" class="form-control">
                                        <option value="" selected>Please Select</option>
                                        @foreach($details as $detail)
                                            <option value="{{$detail->id}}">{{ $detail->email }}</option>
                                        @endforeach    
                                    </select>
                                    <div class="invalid-feedback">Please, select user!</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Active User</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
