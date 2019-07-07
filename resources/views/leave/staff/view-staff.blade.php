@extends('leave.master_leave')

@section('leave-staff','active')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Staff table</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{route('staff.add')}}"><button class="btn btn-outline-success btn-md">
                                    <i class="zmdi zmdi-plus"></i>&nbsp;ADD STAFF</button></a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2" id="data">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th style="padding-left:17px;">name</th>
                                    <th>email</th>
                                    <th>department</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="tr-shadow text-center">
                                    <td class="d-sm-none d-md-block" style="width:100px;">@if(!empty($user->image))
                                        <img src="{{asset('/dashboard/images/user/large/'.$user->image)}}" width="100%"
                                            style="background-color: white;">
                                        @endif</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <span class="block-email">{{$user->email}}</span>
                                    </td>
                                    <td class="desc">{{$user->department}}</td>

                                    <td>
                                        <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#mediumModal{{$user->id}}"
                                            data-tooltip="tooltip" data-toggle="modal"
                                                    data-placement="top" title="Details!">
                                                    <i class="fas fa-file fa-lg"></i></a>                                                  
                                            </li>
                                            
                                            <li class="list-inline-item"><a href="{{route('staff.edit',[$user->id])}}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item ">
                                                <a href="javascript:" rel="{{ $user->id }}" rel1="delete"
                                                    class="deleteData" data-toggle="tooltip" data-placement="top"
                                                    title="Delete!"><i class="fas fa-scissors fa-lg"></i></a>
                                            </li>
                                        </ul>
                                        <!-- modal medium -->
                                            <div class="modal fade" id="mediumModal{{$user->id}}" role="dialog" aria-labelledby="mediumModalLabel"
                                                aria-hidden="true" data-backdrop="static">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                                                    <div class="modal-content" style="background-color: #f5f5f5;">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">{{$user->name}} Details </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="background-color: #f5f5f5;">
                                                            <div class="table-responsive table-responsive-data2">
                                                                <table class="table table-data2" id="tableStaff">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <th>permisstion</th>
                                                                            <th>Status</th>
                                                                            <th style="padding-left:40px; padding-right:40px;">phone</th>
                                                                            <th>Leave Day</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                            <tr class="tr-shadow text-center">
                                                                            <td>
                                                                                @if ($user->permission == 0)
                                                                                <span class="role admin">ADMIN</span>
                                                                                @elseif($user->permission == 1)
                                                                                <span class="role user">USER</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>@if ($user->status == 1)
                                                                                <span class="role member">ACTIVE</span>
                                                                                @elseif($user->status == 0)
                                                                                <span class="role inactive">INACTIVE</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{$user->phone}}</td>
                                                                            <td>
                                                                                <span class="text-danger">{{$user->leave_day}}</span>
                                                                            </td>

                                                                        </tr>
                                                                        <tr class="spacer"></tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal medium -->
                                    </td>
                                    
                                </tr>
                                <tr class="spacer"></tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
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
@if(Session::has('flash_alert_success'))
<script>
    Swal.fire({
        type: 'success',
        title: 'Add staff successfully!',
        text: '{!! Session::get('flash_alert_success') !!}',

        })
</script>

@endif

@if(Session::has('flash_message_success'))
<script>
    Swal.fire({
        type: 'success',
        title: 'Delete staff successfully!',
        text: '{!! Session::get('flash_message_success') !!}',

        })
</script>

@endif

@endsection
