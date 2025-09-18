@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }} — Deposit / Withdrawal</h1>
                <p>Select a payment mode and provide correct details</p>
            </div>
            <img src="" alt="Deposit Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Deposit / Withdrawal Form</h3>
        </div>

        <div class="list">
            <div class="card">
                @include('layouts.error_msg')

                <form style="width: 100%;" method="POST" action="{{ route('deposit.fund.add') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="payment_mode">Payment Mode</label>
                        <select name="payment_mode" id="payment_mode" class="form-control"
                            onchange="getPaymentDetails(this.value)">
                            <option value="" selected>Please Select</option>
                            <option value="usdt">USDT Deposit</option>
                            <option value="bank">Bank Deposit</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control"
                            value="{{ old('amount') }}">
                    </div>

                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" name="remark" id="remark" class="form-control"
                            value="{{ old('remark') }}">
                    </div>

                    <div class="form-group">
                        <label for="screenshot">Upload Screenshot</label>
                        <input type="file" name="screenshot" id="screenshot" class="form-control">
                    </div>

                    <button type="submit" class="form-btn">Submit</button>
                </form>
            </div>
        </div>

        <div class="section mt-4" id="show_details" style="display: none;">
            <div class="line"></div>
            <h3>Payment Details</h3>
        </div>

        <div class="list" id="details_card" style="display: none;">
            <div class="card">
                <div class="text-center">
                    <img src="" alt="Logo" id="logo_details"
                        style="border-radius: 50%; width: 100px; height: 100px;">
                    <img src="" alt="QR Code" id="qrcode_details" class="mt-3"
                        style="display:none; width:150px; height:150px;">
                </div>

                <h4 id="network_bank" class="mt-3 text-center" style="color:#FFF;">Network / Bank</h4>
                <p class="badge bg-primary text-center" id="card-text"></p>

                <hr style="color: #FFF;width: 100%;">
                <div class="row">
                    <div class="col-10">
                        <h5 id="add_acntnum" style="color: #FFF;">Address / Account No.</h5>
                    </div>
                    <div class="col-2 text-end">
                        <button class="btn btn-sm btn-info" onclick="copyText()">Copy</button>
                    </div>
                </div>
                <p class="badge bg-primary" id="crypto_add"></p>

                <div id="bnk_details" style="display: none;">
                    <hr>
                    <h5 style="color: #FFF;">Account Holder Name</h5>
                    <p class="btn btn-sm btn-primary" id="acntholder_name"></p>

                    <hr>
                    <h5 style="color: #FFF;">IFSC</h5>
                    <p class="btn btn-sm btn-primary" id="ifsc"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-push')
    <script>
        function getPaymentDetails(get_value) {
            if (get_value == "usdt") {
                $("#bnk_details").hide();
                $("#network_bank").text("Network");
                $("#add_acntnum").text("Address");
                $.ajax({
                    type: "POST",
                    url: "{{ route('crypto.details') }}",
                    data: "send_value=" + get_value,
                    success: function(response) {
                        $("#qrcode_details").show();
                        var logo_src = `{{ asset('storage/uploads/crypto') }}/${response.logo}`;
                        var qrcode_src = `{{ asset('storage/uploads/crypto') }}/${response.qr_code}`;
                        $("#logo_details").attr("src", logo_src);
                        $("#qrcode_details").attr("src", qrcode_src);
                        $("#card-text").html(response.network);
                        $("#crypto_add").html(response.crypto_add);
                        $("#show_details, #details_card").show();
                    }
                });
            } else {
                $("#network_bank").text("Bank Name");
                $("#add_acntnum").text("Account No.");
                $.ajax({
                    type: "POST",
                    url: "{{ route('crypto.details') }}",
                    data: "send_value=" + get_value,
                    success: function(response) {
                        $("#qrcode_details").hide();
                        var logo_src = `{{ asset('storage/documents/admin_bank_details') }}/${response.logo}`;
                        $("#logo_details").attr("src", logo_src);
                        $("#card-text").html(response.bank_name);
                        $("#crypto_add").html(response.account_num);
                        $("#acntholder_name").text(response.acnt_holder_name);
                        $("#ifsc").text(response.ifsc);
                        $("#bnk_details").show();
                        $("#show_details, #details_card").show();
                    }
                });
            }
        }

        function copyText() {
            var text = document.getElementById("crypto_add").innerText;
            var tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999);
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Copied: " + text);
        }
    </script>
@endpush
