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
                            <strong>ADD STAFF</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('staff.add')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal" id="addStaff">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class="form-control-label">Name</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" id="name" name="name" placeholder="Name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="text-input" class=" form-control-label">Email Address</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="email-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="select" class=" form-control-label">Department</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <select name="department" id="department" class="form-control">
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
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class="form-control-label">Position</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" id="position" name="position" placeholder="Position"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Mobile Phone</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input class="form-control" type="tel" name="phone" id="phone"
                                            placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                            maxlength="12">
                                        <small class="form-text text-muted">format :
                                            012-345-6789</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class="form-control-label">Office Phone</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="tel" id="office_phone" name="office_phone"
                                            placeholder="Office Phone" maxlength="4" class="form-control">
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
                                                <input type="radio" id="permission1" name="permission" value="0">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio form-check-inline" for="permission2">STAFF
                                                <input type="radio" id="permission2" name="permission" value="1"
                                                    checked>
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
                                                <input type="radio" id="status1" name="status" value="1">
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio form-check-inline" for="status2">INACTIVE
                                                <input type="radio" id="status2" name="status" value="0" checked>
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">

                                    </div>
                                    <div class="col-8 col-md-6">
                                        <button type="submit" class="btn btn-warning btn-sm"
                                            style="width:20%;">ADD</button>
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
    @include('sweet::alert')
</footer>
<script src="{{asset('dashboard/js/sweetalert.all.js')}}"></script>

@endsection

@section('script')
<script>
    $('#permission_admin').on('click', function() {
       Swal.fire({
            title: 'Are you sure?',
            text: "To change status from INACIVET to ACTIVE",
            type: 'warning',
            showCancelButton: true,
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Change!',
                'Your change status successfully.',
                'success'
                )

            }else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
                $("#permission2").prop("checked", true);
            }
        })
    });
    $('#status_active').on('click', function() {
        Swal.fire({
        title: 'Are you sure?',
        text: "To change permission from STAFF to ADMIN",
        type: 'warning',
        showCancelButton: true,
        allowEscapeKey: false,
        allowOutsideClick: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Change!',
                'Your change permission successfully.',
                'success'
            )
            }else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
            ) {
            $("#status2").prop("checked", true);
            }
        })
    });
</script>
@endsection
