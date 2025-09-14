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
                                action="{{ route('admin.user.save.team_level') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="team_level" class="form-label">Show Team Level</label>
                                    <input type="number" name="team_level" class="form-control" id="team_level" required value="{{ $details[0]->team_level ?? '' }}">
                                    <div class="invalid-feedback">Please, enter team level!</div>
                                </div>

                                <div class="col-12">
                                    <label for="id_alpha" class="form-label">ID Alpha</label>
                                    <input type="text" name="id_alpha" class="form-control" id="id_alpha" value="{{ $details[0]->id_alpha ?? '' }}">
                                    {{-- <div class="invalid-feedback">Please, enter ID Alpha!</div> --}}
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
