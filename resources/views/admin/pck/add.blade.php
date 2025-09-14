@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Investment Package</li>
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
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
                            <form class="row g-3 needs-validation" method="POST"
                                action="{{ route('add.admin.package.transfer') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="package_id" class="form-label">Package</label>
                                    <select name="package_id" id="package_id" class="form-control">
                                        <option value="" selected>Select Packages</option>
                                        @if($details)
                                            @foreach($details as $detail)
                                                <option value="{{ $detail->id }}">{{ $detail->package_name }}</option>
                                            @endforeach    
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">Please, select package!</div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">User Email</label>
                                    <input type="email" name="email" id="email" class="form-control" onkeyup="getUserDetails(this.value)">
                                    <div class="invalid-feedback">Please, enter user email!</div>
                                    <span class="btn btn-sm btn-primary" id="u_email"></span>
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
@push('script-push')
    <script>
        function getUserDetails(user_email) {
            $.ajax({
                type: "POST",
                url: "{{ route('get.user.details') }}",
                data: {
                    user_email:user_email
                },
                success: function(response) {
                    $("#u_email").html(response.name);
                }
            });
        }
    </script>
@endpush
