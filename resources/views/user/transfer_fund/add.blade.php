@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="wrap">
        <div class="banner">
            <div class="promo-tag">NEW</div>
            <div class="txt">
                <h1>{{ $title }} — Transfer Fund</h1>
                <p>Enter correct details to transfer funds securely</p>
            </div>
            <img src="" alt="App Icon" style="border-radius:12px;">
        </div>

        <div class="title-bar">
            <div class="icon" id="menuButton"><i class="ri-menu-line"></i></div>
            <div class="text">{{ $title }}</div>
        </div>

        <div class="section">
            <div class="line"></div>
            <h3>Add Information</h3>
        </div>

        <div class="list">
            <div class="card">
                @include("layouts.error_msg")

                <form style="width: 100%;" method="POST" action="{{ route('user.fund.transfer') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input 
                            type="text" 
                            id="email" 
                            name="email" 
                            class="form-control" 
                            onkeyup="getUserEmail(this.value)"
                            value="{{ old('email') }}">
                        <small class="text-muted">Please, Enter Transfer User Email</small>
                        <span class="btn btn-sm btn-primary mt-2" id="user_email"></span>
                    </div>

                    <div class="form-group">
                        <label for="amount">Enter Amount</label>
                        <input 
                            type="text" 
                            id="amount" 
                            name="amount" 
                            class="form-control" 
                            value="{{ old('amount') }}">
                        <small class="text-muted">Please, Enter Transfer User Amount</small>
                    </div>

                    <button type="submit" class="form-btn">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script-push')
    <script>
        function getUserEmail(user_email){
            $.ajax({
                type: "POST",
                url: "{{ route('get.user.details') }}",
                data: {
                    user_email: user_email,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#user_email").html(response.name ?? '');
                }
            });
        }
    </script>
@endpush
