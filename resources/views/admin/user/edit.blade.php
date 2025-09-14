@extends('layouts.app')

@section('title', $title)

@section('content')
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

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Details</h5>
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
                                    <label for="sponsor_id" class="form-label">Sponser ID</label>
                                    <input type="text" name="sponsor_id" class="form-control" id="sponsor_id" required value="{{ $user->id }}">
                                    <div class="invalid-feedback">Please, enter your sponsor id!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourName" class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required value="{{ $user->name }}">
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPhone" class="form-label">Your Phone</label>
                                    <input type="text" name="phone" class="form-control" id="yourPhone" required value="{{ $user->phone }}">
                                    <div class="invalid-feedback">Please, enter your phone!</div>
                                </div>

                                <div class="col-12">
                                    <label for="youraddress" class="form-label">Your Address</label>
                                    <input type="text" name="address" class="form-control" id="youraddress" required value="{{ $user->address }}">
                                    <div class="invalid-feedback">Please, enter your address!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourstate" class="form-label">Your State</label>
                                    <input type="text" name="state" class="form-control" id="yourstate" required value="{{ $user->state }}">
                                    <div class="invalid-feedback">Please, enter your state!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourzipcode" class="form-label">Your Zipcode</label>
                                    <input type="text" name="zipcode" class="form-control" id="yourzipcode" required value="{{ $user->zipcode }}">
                                    <div class="invalid-feedback">Please, enter your zipcode!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourcity" class="form-label">Your City</label>
                                    <input type="text" name="city" class="form-control" id="yourcity" required value="{{ $user->city }}">
                                    <div class="invalid-feedback">Please, enter your city!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Your Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required readonly value="{{ $user->email }}">
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                </div>
                                <input type="hidden" name="edit_id" value="{{ $user->id }}">
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Create Account</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
