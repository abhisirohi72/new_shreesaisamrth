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
                    <li class="breadcrumb-item">Team Details</li>
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
                            <p>Total Business = {{ $total_business }}</p>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Total Member</th>
                                        <th>Total Business</th>
                                        <th>Member List</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($details) }} --}}
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $detail['level'] }}</td>
                                            <td>{{ $detail['total'] }}</td>
                                            <td>{{ $detail['investment'] }}</td>
                                            <td>
                                                @if ($detail['ids']->isNotEmpty())
                                                    <a href="{{ route('user.level.list', ['level' => $detail['level'], 'user_ids' => implode(',', $detail['ids']->toArray())]) }}" class="btn btn-sm btn-primary">Show List</a>
                                                @else
                                                    <a href="{{ route('user.level.list', ['level' => $detail['level'], 'user_ids' => '0']) }}" class="btn btn-sm btn-primary">Show List</a>
                                                @endif    
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
