@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Withdrawl Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
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
                                action="{{ route('deposit.fund.add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="payment_mode" class="form-label">Payment Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control"
                                        onchange="getPaymentDetails(this.value)">
                                        <option value="" selected>Please Select</option>
                                        <option value="usdt">USDT Deposit</option>
                                        <option value="bank">Bank Deposit</option>
                                    </select>
                                    <div class="invalid-feedback">Please, enter your Payment Mode!</div>
                                </div>
                                <div class="col-12">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control">
                                    <div class="invalid-feedback">Please, enter your Amount!</div>
                                </div>
                                <div class="col-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <input type="text" name="remark" id="remark" class="form-control">
                                    <div class="invalid-feedback">Please, enter your Remark!</div>
                                </div>
                                <div class="col-12">
                                    <label for="screenshot" class="form-label">Upload Screenshot</label>
                                    <input type="file" name="screenshot" id="screenshot" class="form-control">
                                    <div class="invalid-feedback">Please, enter your screenshot!</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6" id="show_details" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Show Details</h5>
                            <div class="col-lg-12">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="..." id="logo_details"
                                        style="border-radius: 50%; width: 100px; height: 100px;position: relative;left: 38%;">
                                    <img src="" class="card-img-top mt-2" alt="..." id="qrcode_details">
                                    <div class="card-body">
                                        <h3 class="card-title" id="network_bank">Network</h3>
                                        <p class="card-text badge bg-primary" id="card-text"></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <h3 class="card-title" id="add_acntnum">Address</h3>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-sm btn-info" onclick="copyText()">Copy</button>
                                            </div>
                                        </div>
                                        <p class="card-text badge bg-primary" id="crypto_add"></p>
                                        <div id="bnk_details" style="display: none;">
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <h3 class="card-title">Account Holder Name</h3>
                                                </div>
                                                <div class="col-lg-2">
                                                    
                                                </div>
                                            </div>
                                            <p class="btn btn-sm btn-primary" id="acntholder_name"></p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <h3 class="card-title">IFSC</h3>
                                                </div>
                                                <div class="col-lg-2">
                                                    
                                                </div>
                                            </div>
                                            <p class="btn btn-sm btn-primary" id="ifsc"></p>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('script-push')
    <script>
        function getPaymentDetails(get_value) {
            if(get_value=="usdt"){
                $("#bnk_details").hide();
                $("#network_bank").text("Network");
                $("#add_acntnum").text("Address");
                $.ajax({
                    type: "POST",
                    url: "{{ route('crypto.details') }}",
                    data: "send_value=" + get_value,
                    success: function(response) {
                        $("#qrcode_details").show();
                        console.log(response);
                        var logo_src = `{{ asset('storage/uploads/crypto') }}/${response.logo}`;
                        var qrcode_src = `{{ asset('storage/uploads/crypto') }}/${response.qr_code}`;
                        $("#logo_details").attr("src", logo_src);
                        $("#qrcode_details").attr("src", qrcode_src);
                        $("#card-text").html(response.network);
                        $("#crypto_add").html(response.crypto_add);
                        $("#show_details").show();
                    }
                });
            }else{
                $("#network_bank").text("Bank Name");
                $("#add_acntnum").text("Account No.");
                $.ajax({
                    type: "POST",
                    url: "{{ route('crypto.details') }}",
                    data: "send_value=" + get_value,
                    success: function(response) {
                        $("#qrcode_details").hide();
                        console.log(response);
                        var logo_src = `{{ asset('storage/documents/admin_bank_details') }}/${response.logo}`;
                        $("#logo_details").attr("src", logo_src);
                        $("#card-text").html(response.bank_name);
                        $("#crypto_add").html(response.account_num);
                        $("#acntholder_name").text(response.acnt_holder_name);
                        $("#ifsc").text(response.ifsc);
                        $("#bnk_details").show();
                        $("#show_details").show();
                    }
                });
            }
        }

        function copyText() {
            // Select the text inside the <p> tag
            var text = document.getElementById("crypto_add").innerText;

            // Create a temporary input element
            var tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);

            // Select and copy the text
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");

            // Remove the temporary input
            document.body.removeChild(tempInput);

            // Alert or show confirmation
            alert("Copied: " + text);
        }
    </script>
@endpush
