@extends('login.master_login')

@section('title','Leave Manange - Forgot-Password')
@section('content')
<div class="page-wrapper">
    <div class="page-content--bge5"
        style="background-image: url('img/bg.png'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <h1> FORGOT-PASSWORD PAGE </h1>
                        {{-- <img src="{{asset('img/logo_mi.png')}}" width="200" height="100"> --}}

                    </div>
                    <div class="login-form">
                        <form action="{{url('/forgot-password')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                    placeholder="Password">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Send Email</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweet::alert')
</div>
<script src="{{asset('dashboard/js/sweetalert.all.js')}}"></script>
@if (Session::has('flash_alert_errors'))
<script>
    Swal.fire({
        type: 'error',
        title: '{!! Session::get('flash_alert_errors') !!}',

        })
</script>
@endif
@endsection
