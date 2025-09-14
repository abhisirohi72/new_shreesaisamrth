@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">Custom Branding</li> --}}
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Information</h5>
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
                            <!-- Vertical Form -->
                            <form class="row g-3" method="POST" action="{{ route('add.change.color') }}" >
                                @csrf
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Frontend Header Background Colour</label>
                                    <input type="color" class="form-control form-control-color" id="front_header" name="front_header">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Frontend Footer Background Colour</label>
                                    <input type="color" class="form-control form-control-color" id="front_footer" name="front_footer">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Backend Header Background Colour</label>
                                    <input type="color" class="form-control form-control-color" id="backend_header" name="backend_header">
                                </div>
                                <div class="col-12">
                                    <label for="favicon" class="form-label">Backend Sidebar Background Colour</label>
                                    <input type="color" class="form-control form-control-color" id="backend_sidebar" name="backend_sidebar">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
