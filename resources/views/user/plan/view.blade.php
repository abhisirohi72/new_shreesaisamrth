@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('developer.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Plan Details</li>
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
                            <style>
                                .datatable-wrapper {
                                    overflow: auto;
                                }
                            </style>
                            <table class="table datatable" style="">
                                <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Joinning Fees</th>
                                        <th>Commission Type</th>
                                        <th>Payout Method</th>
                                        <th>Min. Withdrawl Limit</th>
                                        <th>Image</th>
                                        <th>Direct Income</th>
                                        <th>Referal Income</th>
                                        <th>Rewards Income</th>
                                        <th>Add View Income</th>
                                        <th>Task Income</th>
                                        <th>Business Volume</th>
                                        <th>Purchase Volume</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                @if ($detail->plan_name == '1')
                                                    <span class="btn btn-sm btn-primary">Silver Plan</span>
                                                @elseif($detail->plan_name == '2')
                                                    <span class="btn btn-sm btn-success">Gold Plan</span>
                                                @elseif($detail->plan_name == '2')
                                                    <span class="btn btn-sm btn-danger">Platinium Plan</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->joinning_fees == '1')
                                                    <span class="btn btn-sm btn-primary">One Time</span>
                                                @elseif($detail->joinning_fees == '2')
                                                    <span class="btn btn-sm btn-success">Monthly</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->commision_type == '1')
                                                    <span class="btn btn-sm btn-primary">Direct</span>
                                                @elseif($detail->commision_type == '2')
                                                    <span class="btn btn-sm btn-success">Binary</span>
                                                @elseif($detail->commision_type == '2')
                                                    <span class="btn btn-sm btn-danger">Uni Level</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->payout_method == '1')
                                                    <span class="btn btn-sm btn-primary">Bank Transfer</span>
                                                @elseif($detail->payout_method == '2')
                                                    <span class="btn btn-sm btn-success">Wallet</span>
                                                @elseif($detail->payout_method == '2')
                                                    <span class="btn btn-sm btn-danger">UPI</span>
                                                @endif
                                            </td>
                                            <td>{{ $detail->min_withdrawl_limit }}</td>
                                            <td>
                                                <img src="{{ asset('storage/documents/plan') . '/' . $detail->image }}"
                                                    alt="" style="width: 100px;height:100px;">
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('direct_income', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('referal_income', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('rewards_income', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('add_view_income', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('task_income', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('business_volume', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="showDetails('purchase_volume', {{ $detail->id }})"> <i
                                                        class="bi bi-pencil"></i> <span>View</span> </button>
                                            </td>
                                            <td>
                                                @if(filled($detail->plan_purchase))
                                                    <button class="btn btn-sm btn-success">Purchased</button>
                                                @else
                                                    {{-- href="{{ route('plan.purchase', ['id'=>$detail->id]) }}" --}}
                                                    <button class="btn btn-sm btn-warning" onclick="purchaseEpin({{ $detail->id }})">Purchase?</button>
                                                @endif
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
    <style>
        #epin_details{
            display: none;
        }
    </style>
    <div class="modal fade" id="planModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="col-12">
                        <label for="amount" class="form-label">Wallet</label>
                        <input type="radio" name="purchase_type" value="wallet" onclick="radioClicked(this)">
                    </div>
                    <div class="col-12">
                        <label for="amount" class="form-label">Epin</label>
                        <input type="radio" name="purchase_type" value="epin" onclick="radioClicked(this)">
                    </div>
                    <div class="col-12" id="epin_details">
                        <label for="amount" class="form-label">Enter Epin</label>
                        <input type="text" class="form-control" name="enter_epin" id="enter_epin">
                    </div>
                    <input type="hidden" id="plan_id" name="plan_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="ajaxCalled()">Send</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
@endsection

@push('script-push')
    <script>
        function ajaxCalled(){
            let selectedValue = document.querySelector('input[name="purchase_type"]:checked');
            var type= selectedValue.value;
            var plan_id = $("#plan_id").val();
            var pin_detail = $("#enter_epin").val();
            $.ajax({
                type:"POST",
                url:"{{ route('plan.purchasing') }}",
                data:"type="+type+"&plan_id="+plan_id+"&pin_details="+pin_detail,
                success:function(response){
                    console.log(response);
                    if(response.error)
                        alert(response.error);
                        window.location.href="";
                    else
                        alert(response.success);
                        window.location.href="";
                }
            });
        }
        
        function radioClicked(radio) {
            // alert("Selected Value: " + radio.value);
            let epinDiv = document.getElementById("epin_details");
            if (radio.value === "epin") {
                epinDiv.style.display = "block";
            } else {
                epinDiv.style.display = "none";
            }
        }

        function purchaseEpin(plan_id) {
            $("#plan_id").val(plan_id);
            $("#planModal").modal("show");
        }

        function showDetails(type, id) {
            $.ajax({
                type: "POST",
                url: "{{ route('user.plan.details') }}",
                data: "type=" + type + "&id=" + id,
                success: function(response) {
                    let tableContent="";
                    if(type=="rewards_income"){
                        tableContent = `
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Target</th>
                                <th>Rewards</th>
                            </tr>
                        </thead>
                        <tbody>`;

                        response.forEach(function(item) {
                            tableContent += `
                        <tr>
                            <td>${item.target}</td>
                            <td>${item.rewards}</td>
                        </tr>`;
                        });
                    }else{
                        tableContent = `
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Level Name</th>
                                <th>Level Value</th>
                            </tr>
                        </thead>
                        <tbody>`;

                        response.forEach(function(item) {
                            tableContent += `
                        <tr>
                            <td>${item.level_name}</td>
                            <td>${item.level_value}</td>
                        </tr>`;
                        });
                    }
                    

                    tableContent += `</tbody></table>`;

                    $("#modal-body").html(tableContent);
                    $("#basicModal").modal("show");
                }
            });
        }
    </script>
@endpush
