@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }}</h1>
                <p>Check your investment history and details securely</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Investment History</h3>
        </div>

        @include('layouts.error_msg')

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover">
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
                            <td>{{ $detail->investment->package_name ?? '' }}</td>
                            <td>{{ $detail->investment->amount ?? '' }}</td>
                            <td>{{ $detail->created_at ?? '' }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="getDetails('{{ $detail->id }}')">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
                </div>
            </div>
        </div>
    </div>
@endsection

@push("script-push")
    <script>
        function getDetails(user_pckg_id){
            $.ajax({
                type: "POST",
                url: "{{ route('get.month.details') }}",
                data: {
                    user_pckg_id: user_pckg_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    $("#res_modal").html(response.data);
                    $("#basicModal").modal("show");
                }
            });
        }

        $(".btn-close").click(function(){
            $("#basicModal").modal("hide");
        });
    </script>
@endpush
