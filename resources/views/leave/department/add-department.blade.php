@extends('leave.master_leave')

@section('leave-department','active')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>ADD DEPARTMENT</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{route('department.add')}}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label class="form-control-label">Department Name</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" id="department_name" name="department_name"
                                            placeholder="Department Name" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">
                                        <label for="text-input" class="form-control-label">Department
                                            Abbreviation</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <input type="text" id="department_abbr" name="department_abbr"
                                            placeholder="Department Abbreviation" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group m-t-20">
                                    <div class="col-4 col-md-3">
                                        <label class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-8 col-md-6">
                                        <div class="form-check-inline">
                                            <label class="radio form-check-inline" for="status1">INACTIVE
                                                <input type="radio" id="status1" name="status" value="0" checked>
                                                <span class="checkround"></span>
                                            </label>
                                            <label class="radio form-check-inline" for="status2"
                                                id="status_inactive">ACTIVE
                                                <input type="radio" id="status2" name="status" value="1">
                                                <span class="checkround"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4 col-md-3">

                                    </div>
                                    <div class="col-8 col-md-6">
                                        <button type="submit" class="btn btn-info btn-sm"
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
    $('#status_inactive').on('click', function() {
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
                $("#status2").prop("checked", true);
            }
        })
    });
</script>
@endsection
