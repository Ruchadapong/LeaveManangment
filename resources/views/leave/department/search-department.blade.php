@extends('leave.master_leave')

@section('leave-department','active')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Department table</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <!-- form search -->
                            <form action="{{route('department.search')}}" method="post" name="search" id="search">
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
                        <!-- go page add department -->
                        <div class="table-data__tool-right">
                            <a href="{{route('department.add')}}"><button class="btn btn-outline-success btn-md">
                                    <i class="zmdi zmdi-plus"></i>&nbsp;ADD DEPARTMENT</button></a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2" id="data">
                            <thead class="text-center">
                                <tr>
                                    <th style="padding-left:15px;">Name</th>
                                    <th>Abbreviation</th>
                                    <th style="padding-left:15px;">Status</th>
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
                                    <td>{{$search->department_name}}</td>
                                    <td class="desc">{{$search->department_abbr}}</td>
                                    <td>@if ($search->status == 1)
                                        <span class="role member">ACTIVE</span>
                                        @elseif($search->status == 0)
                                        <span class="role inactive">INACTIVE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a
                                                    href="{{route('department.edit',[$search->id])}}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item ">
                                                <a href="javascript:" rel="{{ $search->id }}"
                                                    rel1="department/delete-dept" class="deleteData"
                                                    data-toggle="tooltip" data-placement="top" title="Delete!"><i
                                                        class="fas fa-scissors fa-lg"></i></a>
                                            </li>
                                        </ul>
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
@include('sweet::alert')
<script src="{{asset('dashboard/js/sweetalert.all.js')}}"></script>
@if(Session::has('flash_alert_success'))
<script>
    Swal.fire({
        type: 'success',
        title: '{!! Session::get('flash_alert_success') !!}',
        })
</script>

@endif

@if(Session::has('flash_message_success'))
<script>
    Swal.fire({
        type: 'success',
        title: '{!! Session::get('flash_message_success') !!}',
            })
</script>

@endif

@if(Session::has('flash_edit_success'))
<script>
    Swal.fire({
        type: 'success',
        text: '{!! Session::get('flash_edit_success') !!}',
            })
</script>

@endif


@endsection
