@extends('leave.master_leave')

@section('leave-staff','active')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>EDIT STAFF</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{url('leave-management/staff/edit-staff/'.$staffDetails->id)}}" method="post"
                                enctype="multipart/form-data" class="form-horizontal" id="editStaff">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class="form-control-label">Name</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" id="name" name="name" value="{{$staffDetails->name}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="text-input" class=" form-control-label">Email Address</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            value="{{$staffDetails->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="email-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            value="{{$staffDetails->password}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="select" class=" form-control-label">Department</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <select name="department" id="department" class="form-control">
                                            <option value="{{$staffDetails->department}}" selected>
                                                {{$staffDetails->department}} Department</option>
                                            <option value="ADC">ADC Department</option>
                                            <option value="MEL">MEL Department</option>
                                            <option value="CKM">CKM Department</option>
                                            <option value="TIF">TIF Department</option>
                                            <option value="LTC">LTC Department</option>
                                            <option value="FOD">FOD Department</option>
                                            <option value="EWEC">EWEC Department</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="leave_day" class=" form-control-label">Leave Days</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="number" id="leave_day" name="leave_day"
                                            value="{{$staffDetails->leave_day}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Phone</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input class="form-control" type="tel" name="phone" id="phone"
                                            value="{{$staffDetails->phone}}" placeholder="xxx-xxx-xxxx"
                                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12">
                                        <small class="form-text text-muted">format :
                                            012-345-6789</small>
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Permission</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="form-check-inline">
                                            <label class="radio form-check-inline" for="permission1"
                                                id="permission_admin">ADMIN
                                                <input type="radio" id="permission1" name="permission" value="0"
                                                    @if($staffDetails->permission
                                                == 0)
                                                checked @endif>
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio form-check-inline" for="permission2">STAFF
                                                <input type="radio" id="permission2" name="permission" value="1"
                                                    @if($staffDetails->permission
                                                == 1)
                                                checked @endif>
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="form-check-inline">
                                            <label class="radio form-check-inline" for="status1"
                                                id="status_active">ACTIVE
                                                <input type="radio" id="status1" name="status" value="1"
                                                    @if($staffDetails->status
                                                == 1)
                                                checked @endif>
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio form-check-inline" for="status2">INACTIVE
                                                <input type="radio" id="status2" name="status" value="0"
                                                    @if($staffDetails->status
                                                == 0)
                                                checked
                                                @endif>
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">image</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-warning btn-file">
                                                    Upload Here..<input type="file" id="imgInp" name="image">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                            <input type="hidden" name="current_image"
                                                value="{{ $staffDetails->image }}">


                                        </div>
                                        <img id='img-upload'
                                            src="{{asset('dashboard/images/user/large/'.$staffDetails->image)}}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">

                                    </div>
                                    <div class="col-8 col-md-6">
                                        <button type="submit" class="btn btn-warning btn-sm"
                                            style="width:20%;">EDIT</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<footer id="sticky-footer">
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2019 DEV-BOSS. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
            </div>
        </div>
    </div>
</footer>

@include('sweet::alert')
<script src="{{asset('dashboard/js/sweetalert.all.js')}}"></script>
@if(Session::has('flash_edit_success'))
<script>
    Swal.fire({
        type: 'success',
        title: '{!! Session::get('flash_edit_success') !!}',
        })
</script>
@endif
@endsection
