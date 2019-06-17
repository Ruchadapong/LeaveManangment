@extends('login.master_login')

@section('title','Leave Manage - Register')
@section('content')
<div class="page-wrapper">
    <div class="page-content--bgf7"
        style="background-image: url('img/bg.png'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="login-wrap padding">
                <div class="login-content">
                    <div class="login-logo">
                        <h1> REGISTER PAGE</h1>
                        {{-- <img src="{{asset('img/logo_mi.png')}}" width="200" height="100"> --}}

                    </div>
                    <div class="login-form">
                        <form action="{{url('/register')}}" method="post" name="register">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="au-input au-input--full" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>E-mail Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select name="department" id="selectLg" class="form-control formSelect">
                                    <option value=" " selected>Select Department</option>
                                    <option value="ADC">ADC Department</option>
                                    <option value="MEL">MEL Department</option>
                                    <option value="CKM">CKM Department</option>
                                    <option value="TIF">TIF Department</option>
                                    <option value="LTC">LTC Department</option>
                                    <option value="FOD">FOD Department</option>
                                    <option value="EWEC">EWEC Department</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone <small> format : 012-345-6789</small></label>
                                <input class="au-input au-input--full" type="tel" name="phone"
                                    placeholder="Phone number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12">
                            </div>

                            <button class="au-btn au-btn--block au-btn--blue m-b-15" type="submit">Register</button>

                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{url('/')}}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{asset('dashboard/js/sweetalert.all.js')}}"></script>
@if (Session::has('flash_alert_errors'))
<script>
    Swal.fire({
        type: 'error',
        title: '{!! Session::get('flash_alert_errors') !!}',

        })
</script>
@elseif(Session::has('flash_alert_success'))
<script>
    Swal.fire({
        type: 'success',
        title: '{!! Session::get('flash_alert_success') !!}',
        text: 'Please confirm your email to activate your account!',



        })
</script>
@endif
@endsection
