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
                            <form action="{{route('staff.search')}}" method="post" name="search" id="search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="au-input" name="search" id="search"
                                        placeholder="Search Table Here!">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                    <th>position</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($searches))
                                <tr class="tr-shadow text-center" id="noresults">
                                    <td colspan="6">No Results</td>
                                </tr>
                                @else
                                @foreach ($searches as $search)
                                <tr class="tr-shadow text-center">
                                    <td class="d-sm-none d-md-block" style="width:100px;">@if(!empty($search->image))
                                        <img src="{{asset('/dashboard/images/user/large/'.$search->image)}}"
                                            width="100%" style="background-color: white;">
                                        @endif</td>
                                    <td>{{$search->name}}</td>
                                    <td>
                                        <span class="block-email">{{$search->email}}</span>
                                    </td>
                                    <td class="desc">{{$search->department}}</td>
                                    <td class="position">{{$search->position}}</td>

                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#mediumModal{{$search->id}}"
                                                    data-tooltip="tooltip" data-toggle="modal" data-placement="top"
                                                    title="Details!">
                                                    <i class="fas fa-file fa-lg"></i></a>
                                            </li>

                                            <li class="list-inline-item"><a href="{{route('staff.edit',[$search->id])}}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item ">
                                                <a href="javascript:" rel="{{ $search->id }}" rel1="delete"
                                                    class="deleteData" data-toggle="tooltip" data-placement="top"
                                                    title="Delete!"><i class="fas fa-scissors fa-lg"></i></a>
                                            </li>
                                        </ul>
                                        <!-- modal medium -->
                                        <div class="modal fade" id="mediumModal{{$search->id}}" role="dialog"
                                            aria-labelledby="mediumModalLabel" aria-hidden="true"
                                            data-backdrop="static">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content" style="background-color: #f5f5f5;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mediumModalLabel">{{$search->name}}
                                                            Details </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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
                                                                        <th>phone</th>
                                                                        <th>office phone</th>
                                                                        <th>Leave Balance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr class="tr-shadow text-center">

                                                                        <td>
                                                                            @if ($search->permission == 0)
                                                                            <span class="role admin">ADMIN</span>
                                                                            @elseif($search->permission == 1)
                                                                            <span class="role user">USER</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>@if ($search->status == 1)
                                                                            <span class="role member">ACTIVE</span>
                                                                            @elseif($search->status == 0)
                                                                            <span class="role inactive">INACTIVE</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$search->phone}}</td>
                                                                        <td>{{$search->office_phone}}</td>
                                                                        <td>
                                                                            <span
                                                                                class="text-danger">{{$search->leave_day}}</span>
                                                                        </td>

                                                                    </tr>
                                                                    <tr class="spacer"></tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal medium -->
                                    </td>

                                </tr>
                                <tr class="spacer"></tr>

                                @endforeach
                                @endif
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
{{-- @include('sweet::alert')
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

@endif --}}

@endsection
