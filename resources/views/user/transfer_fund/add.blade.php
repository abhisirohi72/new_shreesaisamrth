@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Deposit Fund</li>
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
                                action="{{ route('user.fund.transfer') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="payment_mode" class="form-label">Enter Email</label>
                                    <input type="text" id="email" name="email" class="form-control" onkeyup="getUserEmail(this.value)">
                                    <div class="invalid-feedback">Please, Enter Transfer User Email</div>
                                    <span class="btn btn-sm btn-primary" id="user_email"></span>
                                </div>

                                <div class="col-12">
                                    <label for="payment_mode" class="form-label">Enter Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control">
                                    <div class="invalid-feedback">Please, Enter Transfer User amount</div>
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
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
        function getUserEmail(user_email){
            $.ajax({
                type: "POST",
                url: "{{ route('get.user.details') }}",
                data: {
                    user_email:user_email
                },
                success: function(response) {
                    console.log(response);
                    $("#user_email").html(response.name);
                }
            });
        }
    </script>
@endpush
