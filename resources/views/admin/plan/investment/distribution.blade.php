@extends('layouts.app')

@section('title', $title)

@section('content')
    <style>
        .datatable-container {
            overflow: auto;
            min-height: 200px;
        }
    </style>
    <main id="main" class="main">

        <div classPlanpagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Plan Management</li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment Distribution</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="investment_dist" name="investment_dist">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('investment_dist');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="investment_dist_append"></div>
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
        function generateIncome(type){
            console.log(type);

            var append_details='';
            var getTotalNum = $("#investment_dist").val();
            for (let index = 1; index <= getTotalNum; index++) {
                append_details +=`<div id='level_row`+index+`' class="row mt-2">
                                <div class="col-5">
                                    <label for="part_time" class="form-label" style="width:100%">Level `+index+` <span style="float:right;">Hourlywise</span></label>
                                    <input type="number" class="form-control hourly" name="hourly[]" >
                                </div>
                                <div class="col-3">
                                    <label for="part_time" class="form-label">Dailywise</label>
                                    <input type="number" class="form-control dailywise" name="dailywise[]" >
                                </div>
                                <div class="col-3">
                                    <label for="part_time" class="form-label">Monthlywise</label>
                                    <input type="number" class="form-control monthlywise" name="monthlywise[]" >
                                </div>
                                <div class="col-1">
                                    <span onclick="delete_row('level_row`+index+`')" style="cursor:pointer;"><i class="ri-delete-back-2-fill" style="color:#ff0000;"></i></span>
                                </div>    
                            </div>`;
                
            }
            
            append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('purchase');">Save</button>`;
            $("#investment_dist_append").html(append_details);
            
        }

        function delete_row(row_id){
            $("#"+row_id).remove();
        }

        function saveIncome(cond){
            let send_values=[];
            
            var send_url= "{{ route('add.investment.distribution') }}";

            let formData = new FormData();
            
            $(".hourly").each(function () {
                formData.append("hourly[]", $(this).val());
            });

            $(".dailywise").each(function () {
                formData.append("dailywise[]", $(this).val());
            });

            $(".monthlywise").each(function () {
                formData.append("monthlywise[]", $(this).val());
            });

            formData.append("package_id", "{{ request()->segment('3') }}");
            
            $.ajax({
                type:"POST",
                url:send_url,
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    console.log("Response:", response);
                    if(response.success)
                        alert("Data submitted successfully!");
                    else
                        alert("There is some issue on inserting!");
                    // window.location.href="";
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });  
        }
    </script>
@endpush