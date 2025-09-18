@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your plan details and purchase status</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Plan Details</h3>
        </div>
        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Joining Fees</th>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                @if ($detail->plan_name == '1')
                                    Silver Plan
                                @elseif($detail->plan_name == '2')
                                    Gold Plan
                                @elseif($detail->plan_name == '3')
                                    Platinium Plan
                                @endif
                            </td>
                            <td>
                                @if ($detail->joinning_fees == '1')
                                    One Time
                                @elseif($detail->joinning_fees == '2')
                                    Monthly
                                @endif
                            </td>
                            <td>
                                @if ($detail->commision_type == '1')
                                    Direct
                                @elseif($detail->commision_type == '2')
                                    Binary
                                @elseif($detail->commision_type == '3')
                                    Uni Level
                                @endif
                            </td>
                            <td>
                                @if ($detail->payout_method == '1')
                                    Bank Transfer
                                @elseif($detail->payout_method == '2')
                                    Wallet
                                @elseif($detail->payout_method == '3')
                                    UPI
                                @endif
                            </td>
                            <td>{{ $detail->min_withdrawl_limit }}</td>
                            <td>
                                <img src="{{ asset('storage/documents/plan/' . $detail->image) }}"
                                    alt="Plan Image" style="width:100px; height:100px; border-radius:8px;">
                            </td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('direct_income', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('referal_income', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('rewards_income', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('add_view_income', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('task_income', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('business_volume', {{ $detail->id }})">View</button></td>
                            <td><button class="btn btn-sm btn-primary" onclick="showDetails('purchase_volume', {{ $detail->id }})">View</button></td>
                            <td>
                                @if(filled($detail->plan_purchase))
                                    <span class="badge bg-success">Purchased</span>
                                @else
                                    <button class="btn btn-sm btn-warning" onclick="purchaseEpin({{ $detail->id }})">Purchase?</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Bootstrap Modals --}}
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="planModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <label class="form-label">Wallet</label>
                        <input type="radio" name="purchase_type" value="wallet" onclick="radioClicked(this)">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Epin</label>
                        <input type="radio" name="purchase_type" value="epin" onclick="radioClicked(this)">
                    </div>
                    <div class="col-12" id="epin_details" style="display:none;">
                        <label class="form-label">Enter Epin</label>
                        <input type="text" class="form-control" id="enter_epin">
                    </div>
                    <input type="hidden" id="plan_id">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="ajaxCalled()">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-push')
<script>
    function ajaxCalled(){
        let selectedValue = document.querySelector('input[name="purchase_type"]:checked');
        var type = selectedValue ? selectedValue.value : '';
        var plan_id = $("#plan_id").val();
        var pin_detail = $("#enter_epin").val();

        $.post("{{ route('plan.purchasing') }}", {
            type: type, plan_id: plan_id, pin_details: pin_detail, _token: '{{ csrf_token() }}'
        }, function(response){
            if(response.error) alert(response.error);
            else alert(response.success);
            location.reload();
        });
    }

    function radioClicked(radio) {
        $("#epin_details").toggle(radio.value === "epin");
    }

    function purchaseEpin(plan_id) {
        $("#plan_id").val(plan_id);
        $("#planModal").modal("show");
    }

    function showDetails(type, id) {
        $.post("{{ route('user.plan.details') }}", {
            type: type, id: id, _token: '{{ csrf_token() }}'
        }, function(response){
            let tableContent = "";
            if(type === "rewards_income"){
                tableContent = `<table class="table table-bordered"><thead><tr><th>Target</th><th>Rewards</th></tr></thead><tbody>`;
                response.forEach(item => tableContent += `<tr><td>${item.target}</td><td>${item.rewards}</td></tr>`);
            } else {
                tableContent = `<table class="table table-bordered"><thead><tr><th>Level Name</th><th>Level Value</th></tr></thead><tbody>`;
                response.forEach(item => tableContent += `<tr><td>${item.level_name}</td><td>${item.level_value}</td></tr>`);
            }
            tableContent += `</tbody></table>`;
            $("#modal-body").html(tableContent);
            $("#basicModal").modal("show");
        });
    }
</script>
@endpush
