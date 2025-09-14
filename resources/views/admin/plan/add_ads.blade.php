@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }} </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">plan Management</li>
                    <li class="breadcrumb-item active">{{ $title }} </li>
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
                            <form class="row g-3" method="POST" action="{{ route('save.plan.ads') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="part_time" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $details->title ?? '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="pdf" class="form-label">URL</label>
                                    <textarea name="url" id="url" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="text-center">
                                @if(!empty($details))
                                        <input type="hidden" name="edit_id" value="{{ $details->id }}">
                                        <input type="hidden" name="old_image" value="{{ $details->image }}">
                                    @endif
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
