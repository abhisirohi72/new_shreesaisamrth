@extends('layouts.app')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }} </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">{{ $title }} </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Direct Income</h5>
                            {{-- <form class="row g-3" method="POST"> --}}
                                <div class="row">
                                    <div class="col-7">
                                        <input type="number" class="form-control" id="direct_income" name="direct_income">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-primary" onclick="generateIncome('direct');">Generate</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="direct_append"></div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Referal Income</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="referal_income" name="referal_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('referal');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="referal_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rewards Income</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="rewards_income" name="rewards_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('rewards');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="rewards_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add View Income</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="view_income" name="view_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('view');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="view_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Task Income</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="task_income" name="task_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('task');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="task_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Business Volume</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="business_income" name="business_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('business');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="business_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Purchase Volume</h5>
                            <div class="row">
                                <div class="col-7">
                                    <input type="number" class="form-control" id="purchase_income" name="purchase_income">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" onclick="generateIncome('purchase');">Generate</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="purchase_append"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('script-push')
    <script>
        function generateIncome(type){
            console.log(type);
            if (type=='direct') {
                var getTotalNum = $("#direct_income").val();
            }else if (type=='referal') {
                var getTotalNum = $("#referal_income").val();
            }else if (type=='rewards') {
                var getTotalNum = $("#rewards_income").val();
            }else if (type=='view') {
                var getTotalNum = $("#view_income").val();
            }else if (type=='task') {
                var getTotalNum = $("#task_income").val();
            }else if (type=='business') {
                var getTotalNum = $("#business_income").val();
            }else if (type=='purchase') {
                var getTotalNum = $("#purchase_income").val();
            }

            var append_details='';
            
            for (let index = 1; index <= getTotalNum; index++) {
                if (type!='rewards') {
                    append_details +=`<div id='level_row`+index+`' class="row">
                                    <div class="col-10">
                                        <label for="part_time" class="form-label">Level `+index+`</label>
                                        <input type="number" class="form-control main_level" name="main_level[]" >
                                    </div>
                                    <div class="col-2">
                                        <span onclick="delete_row('level_row`+index+`')" style="cursor:pointer;"><i class="ri-delete-back-2-fill" style="color:#ff0000;"></i></span>
                                    </div>    
                                </div>`;
                }else{
                    append_details +=`<div id='level_row`+index+`' class="row mt-2">
                                    <div class="col-5">
                                        <label for="part_time" class="form-label">Target `+index+`</label>
                                        <input type="number" class="form-control main_level" name="main_level[]" >
                                    </div>
                                    <div class="col-3">
                                        <label for="part_time" class="form-label">Rewards `+index+`</label>
                                        <input type="text" class="form-control rewards" name="rewards[]" >
                                    </div>
                                    <div class="col-3">
                                        <label for="part_time" class="form-label">Image `+index+`</label>
                                        <input type="file" class="form-control rewards_image" name="rewards_image[]" >
                                    </div>
                                    <div class="col-1">
                                        <span onclick="delete_row('level_row`+index+`')" style="cursor:pointer;"><i class="ri-delete-back-2-fill" style="color:#ff0000;"></i></span>
                                    </div>    
                                </div>`;
                }
            }
            if (type=='direct') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('direct');">Save</button>`;
                $("#direct_append").html(append_details);
            }else if (type=='referal') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('referal');">Save</button>`;
                $("#referal_append").html(append_details);
            }else if (type=='rewards') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('rewards');">Save</button>`;
                $("#rewards_append").html(append_details);
            }else if (type=='view') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('view');">Save</button>`;
                $("#view_append").html(append_details);
            }else if (type=='task') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('task');">Save</button>`;
                $("#task_append").html(append_details);
            }else if (type=='business') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('business');">Save</button>`;
                $("#business_append").html(append_details);
            }else if (type=='purchase') {
                append_details += `<button class="btn btn-primary mt-2" onclick="saveIncome('purchase');">Save</button>`;
                $("#purchase_append").html(append_details);
            }
        }

        function delete_row(row_id){
            $("#"+row_id).remove();
        }

        function saveIncome(cond){
            let send_values=[];
            if(cond=="direct"){
                var send_url= "{{ route('save.direct.income') }}";
            }else if(cond=="referal"){
                var send_url= "{{ route('save.referal.income') }}";
            }else if(cond=="rewards"){
                var send_url= "{{ route('save.rewards.income') }}";
            }else if(cond=="view"){
                var send_url= "{{ route('save.view.income') }}";
            }else if(cond=="task"){
                var send_url= "{{ route('save.task.income') }}";
            }else if(cond=="business"){
                var send_url= "{{ route('save.business.income') }}";
            }else if(cond=="purchase"){
                var send_url= "{{ route('save.purchase.income') }}";
            }

            let formData = new FormData();
            if(cond=="rewards"){
                // Collect all file inputs
                $(".rewards_image").each(function () {
                    let files = $(this)[0].files;
                    for (let i = 0; i < files.length; i++) {
                        formData.append("rewards_image[]", files[i]); // Append files
                    }
                });

                // Collect all main_level values
                $(".main_level").each(function () {
                    formData.append("target[]", $(this).val());
                });

                // Collect all rewards values
                $(".rewards").each(function () {
                    formData.append("rewards[]", $(this).val());
                });

            }else{
                $(".main_level").each(function(){
                    formData.append("level_data[]", $(this).val());
                });
            }
            formData.append("plan_id", "{{ $plan_id }}");
            $.ajax({
                type:"POST",
                url:send_url,
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    console.log("Response:", response);
                    alert("Data submitted successfully!");
                    // window.location.href="";
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });  
        }
    </script>
@endpush
