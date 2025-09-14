@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }} </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">User Management</li> --}}
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
                            <form class="row g-3" method="POST" action="{{ route('save.admin.add_fund') }}">
                                @csrf

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Add Email</label>
                                    <input type="text" name="add_email" id="add_email"  class="form-control" onkeyup="getName(this.value)">
                                    <span class="btn btn-sm btn-primary" id="user_fetch_email"></span>
                                </div>

                                <div class="col-12">
                                    <label for="part_time" class="form-label">Add Fund</label>
                                    <input type="text" name="add_fund" id="add_fund"  class="form-control">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                {{ $detail->user_email ?? '' }}
                                            </td>
                                            <td>
                                                {{ $detail->users->name ?? ''}}
                                            </td>
                                            <td>
                                                {{ $detail->amount ?? ''}}
                                            </td>
                                            <td>
                                                {{ $detail->created_at ?? ''}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('script-push')
    <script>
        function getName(get_email){
            $.ajax({
                type:"POST",
                url:"{{ route('admin.get.user.name') }}",
                data:{
                    user_email:get_email
                },
                success:function(response){
                    console.log(response);
                    $("#user_fetch_email").html(response.name);
                }
            });  
        }
    </script>
@endpush