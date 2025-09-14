@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Wallet Details</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
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
                                        <th>User Email</th>
                                        <th>Amount</th>
                                        <th>Admin Charges</th>
                                        <td>TDS</td>
                                        <td>Final Amount</td>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                {{ $detail->user->email }}
                                                <button class="btn btn-sm btn-primary" onclick="showAccountDetails({{ $detail->id }}, '{{ $detail->details }}')">Account Details</button>
                                            </td>
                                            <td>
                                                {{ $detail->amount }}
                                            </td>
                                            <td>
                                                {{ $detail->admin_charge }}
                                            </td>
                                            <td>
                                                {{ $detail->tds }}
                                            </td>
                                            <td>
                                                {{ $detail->f_amount }}
                                            </td>
                                            <td>
                                                @if($detail->status=="0")
                                                    <button class="btn btn-sm btn-primary">Pending</button>
                                                @elseif($detail->status=="1")
                                                    <button class="btn btn-sm btn-success">Active</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                @endif    
                                            </td>
                                            <td>
                                                {{ $detail->created_at }}
                                            </td>
                                            <td>
                                                <ul class="d-flex align-items-left">
                                                    <li class="nav-item dropdown pe-3" style="list-style:none">

                                                        <a class="nav-link nav-profile d-flex align-items-center pe-0"
                                                            href="#" data-bs-toggle="dropdown">
                                                            <span
                                                                class="d-none d-md-block dropdown-toggle ps-2">Action</span>
                                                        </a><!-- End Profile Iamge Icon -->

                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.withdrawl.change.status', ['id' => $detail->id, 'status' => '0']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Pending</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.withdrawl.change.status', ['id' => $detail->id, 'status' => '1']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Active</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>

                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.withdrawl.change.status', ['id' => $detail->id, 'status' => '2']) }}">
                                                                    <i class="bi bi-person"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </li>


                                                        </ul><!-- End Profile Dropdown Items -->
                                                    </li><!-- End Profile Nav -->
                                                </ul>
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
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div id="crypto_details" style="display: none;">
                        <table class="table table-bordered">
                            <tr>
                                <td>Logo</td>
                                <td >
                                    <img src="" id="m_logo" alt="" style="width:100px; height:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td>QR Code</td>
                                <td >
                                    <img src="" id="m_qr_code" alt="" style="width: 100px;height:100px;">
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td id="m_crypto_add"></td>
                            </tr>
                            <tr>
                                <td>Network</td>
                                <td id="m_network"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="bank_details" style="display:none;">
                        <table class="table table-bordered">
                            <tr>
                                <td>Bank Account Holder Name (As per bank records)</td>
                                <td id="m_holder_name"></td>
                            </tr>
                            <tr>
                                <td>Bank Name</td>
                                <td id="m_bank_name"></td>
                            </tr>
                            <tr>
                                <td>Account Number</td>
                                <td id="m_account_number"></td>
                            </tr>
                            <tr>
                                <td>IFSC Code</td>
                                <td id="m_ifsc"></td>
                            </tr>
                            <tr>
                                <td>Google Pe</td>
                                <td id="m_google_pe"></td>
                            </tr>
                            <tr>
                                <td>Phone Pe</td>
                                <td id="m_phonepe"></td>
                            </tr>
                            <tr>
                                <td>Paytm</td>
                                <td id="m_paytm"></td>
                            </tr>
                        </table>
                    </div>
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
        function showAccountDetails(id, cond){
            console.log(id);
            $.ajax({
                type:"POST",
                url:"{{ route('show.user.acnt') }}",
                data:{
                    id:id
                },
                success:function(response){
                    if(cond=="bank"){
                        $("#m_account_number").text(response.account_number);
                        $("#m_bank_name").text(response.bank_name);
                        $("#m_google_pe").text(response.google_pe);
                        $("#m_holder_name").text(response.holder_name);
                        $("#m_ifsc").text(response.ifsc);
                        $("#m_paytm").text(response.paytm);
                        $("#m_phonepe").text(response.phonepe);

                        $("#bank_details").show();
                        $("#crypto_details").hide();
                    }else{
                        $("#m_crypto_add").text(response.crypto_add);
                        $("#m_logo").attr("src", "{{ asset('storage/uploads/crypto').'/' }}"+response.logo);
                        $("#m_qr_code").attr("src", "{{ asset('storage/uploads/crypto').'/' }}"+response.qr_code);
                        $("#m_network").text(response.network);
                        $("#bank_details").hide();
                        $("#crypto_details").show();
                    }
                    $("#basicModal").modal("show");
                }
            });
        }
    </script>
@endpush
