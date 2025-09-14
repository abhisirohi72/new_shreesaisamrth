@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Investment Packages</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment History</h5>
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
                                        <th>Package Name</th>
                                        <th>Amount</th>
                                        <th>Purchase Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                {{ $detail->investment->package_name ?? ''}}
                                            </td>
                                            <td>
                                                {{ $detail->investment->amount ?? ''}}
                                            </td>
                                            <td>{{ $detail->created_at ?? ''}}</td>
                                            <td>
                                                {{-- @if(in_array($detail->id, $purchased_package))
                                                    <span class="badge bg-success">Purchased</span>
                                                @else    
                                                    <a href="{{ route('user.package.purchase', ['package_id'=> $detail->id ]) }}" class="btn btn-sm btn-primary" >Purchase</a>
                                                @endif     --}}
                                                <button class="btn btn-sm btn-primary" onclick="getDetails('{{ $detail->id }}')">View </button>
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
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <table class="table" id="res_modal">
                        <tr>
                            <td>Month</td>
                            <td>Is Complete</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
@endsection
@push("script-push")
    <script>
        function getDetails(user_pckg_id){
            $.ajax({
                type:"POST",
                url:"{{ route('get.month.details') }}",
                data:"user_pckg_id="+user_pckg_id,
                success:function(response){
                    $("#res_modal").html(response.data);
                    $("#basicModal").modal("show");
                }
            })
        }
    </script>
@endpush