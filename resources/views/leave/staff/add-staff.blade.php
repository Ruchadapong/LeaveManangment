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
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Name</label>
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
                                        <label class=" form-control-label">Phone</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input class="form-control" type="tel" name="phone" id="phone"
                                            placeholder="Phone number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                            maxlength="12">
                                        <small class="form-text text-muted">format :
                                            012-345-6789</small>
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Permission</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="radio radio-danger radio-inline form-check-inline">
                                            <input type="radio" id="permisstion1" value="0" name="permisstion">
                                            <label for="permisstion"> ADMIN </label>
                                        </div>
                                        <div class="radio radio-info radio-inline form-check-inline">
                                            <input type="radio" id="permisstion2" value="1" name="permisstion" checked>
                                            <label for="permisstion"> STAFF</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="radio radio-primary radio-inline form-check-inline">
                                            <input type="radio" id="status1" value="1" name="status">
                                            <label for="status"> ACTIVE </label>
                                        </div>
                                        <div class="radio radio-secondary radio-inline form-check-inline">
                                            <input type="radio" id="status2" value="0" name="status" checked>
                                            <label for="inlineRadio2">INACTIVE</label>
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
    $('.radio-primary').on('click', function() {
       Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                $("#status1").attr("checked");
            }
        })
    });
    $('.radio-danger').on('click', function() {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            $("#permission1").attr("checked");
            }
        })
    });
</script>
@endsection
