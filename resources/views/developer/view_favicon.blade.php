@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Custom Branding</li>
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
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Favicon</th>
                                        <th>Logo</th>
                                        <th>Backend Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($details as $detail) --}}
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/webiste_setting/' . $details->favicon) }}" alt="" style="width: 100px; height: 100px;">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/webiste_setting/' . $details->logo) }}" alt="" style="width: 100px; height: 100px;">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/webiste_setting/' . $details->backend_logo) }}" alt="" style="width: 100px; height: 100px;">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('developer.favicon.edit', ['id' => $details->id]) }}"> <i class="bi bi-pencil"></i> <span>Edit</span> </a>
                                            </td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
