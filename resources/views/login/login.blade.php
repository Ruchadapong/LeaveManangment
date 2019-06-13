@extends('login.master_login')

@section('title','Leave Manange - Sign_In')
@section('content')

<div class="page-wrapper">
    <div class="page-content--bge5"
        style="background-image: url('img/bg.png'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <h1>PAGE SIGN-IN</h1>
                        {{-- <img src="{{asset('img/logo_mi.png')}}" width="200" height="100"> --}}

                    </div>

                    <div class="login-form">
                        <form action="{{url('/')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="au-input au-input--full" type="email" name="email" id="email"
                                    placeholder="E-mail" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" id="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="login-checkbox float-right">
                                <label>
                                    <a href="#">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-15" type="submit">sign in</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="{{url('/register')}}">Sign Up Here</a>
                            </p>
                        </div>
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
