@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <button class="btn btn-sm btn-primary" style="float: right;position: relative;top: -20px;" onclick="payoutDistribution()" id="payout">Payout Distribution</button>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                {{-- <div class="col-lg-12"> --}}
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">New Users Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $today_user }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End New User -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Withdrawl Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $today_withdrawl }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Approved Deposit Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-piggy-bank"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $today_approved_fund }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Deposit Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-save"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $today_pending_fund }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Last Login Admin</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-login-box-line"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $last_login }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Registered Users</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_registered_user }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_active_user }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Withdrawls</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-collection-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_withdrawl }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Wallet User</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-rupee"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_user_wallet }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Withdrawl today -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Purchase Package</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_pckg_purchase }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End package purchase -->
                {{-- </div> --}}
        </section>
    </main>
@endsection
@push('script-push')
    <script>
        function payoutDistribution(){
            $("#payout").attr("disabled", "disabled");
            $.ajax({
                type:"POST",
                url:"{{ route('payout.distribution') }}",
                data:{

                },
                success:function(data){
                    if(data==1){
                        alert("Successfully Updated!!!");
                        window.location.href="";
                    }
                }
            });
        }
    </script>
@endpush
