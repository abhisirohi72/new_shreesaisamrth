@extends('layouts.app')

@section('title', $title)

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    @if($faviconDetails)
                                        <img src="{{ asset('storage/webiste_setting/' . $faviconDetails->backend_logo) }}" alt="" style="width: 100px; height: 100px;">
                                    @else
                                        <img src="{{ asset('assets/img/logo.png')}}" alt="">
                                    @endif  
                                    {{-- <span class="d-none d-lg-block">NiceAdmin</span> --}}
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3" style="width: 500px;">

                                <div class="card-body">
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

                                    <div class="col-md-12 pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">User Details</h5>
                                        <p class="text-center small">Name : {{ $details->name }}</p>
                                        <p class="text-center small">User id : {{ $details->unique_id }}</p>
                                        <p class="text-center small">Email : {{ $details->email }}</p>
                                        <p class="text-center small">Password : {{ $pass }}</p>

                                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="credits">
                                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
    
@endsection
