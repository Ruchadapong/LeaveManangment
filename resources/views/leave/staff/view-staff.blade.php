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
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>department</th>
                                    <th>phone</th>
                                    <th>permisstion</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="tr-shadow">
                                    <td>img 1</td>
                                    <td>Lori Lynch</td>
                                    <td>
                                        <span class="block-email">lori@example.com</span>
                                    </td>
                                    <td class="desc">Samsung S8 Black</td>
                                    <td>2018-09-27 02:12</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>$679.00</td>
                                    <td>

                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Delete!"><i
                                                        class="fas fa-scissors fa-lg"></i></a></li>

                                        </ul>

                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>img 2</td>
                                    <td>Lori Lynch</td>
                                    <td>
                                        <span class="block-email">john@example.com</span>
                                    </td>
                                    <td class="desc">iPhone X 64Gb Grey</td>
                                    <td>2018-09-29 05:57</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>$999.00</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Delete!"><i
                                                        class="fas fa-scissors fa-lg"></i></a></li>

                                        </ul>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>img 3</td>
                                    <td>Lori Lynch</td>
                                    <td>
                                        <span class="block-email">lyn@example.com</span>
                                    </td>
                                    <td class="desc">iPhone X 256Gb Black</td>
                                    <td>2018-09-25 19:03</td>
                                    <td>
                                        <span class="status--denied">Denied</span>
                                    </td>
                                    <td>$1199.00</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Delete!"><i
                                                        class="fas fa-scissors fa-lg"></i></a></li>

                                        </ul>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>img 4</td>
                                    <td>Lori Lynch</td>
                                    <td>
                                        <span class="block-email">doe@example.com</span>
                                    </td>
                                    <td class="desc">Camera C430W 4k</td>
                                    <td>2018-09-24 19:10</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>$699.00</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Edit!"><i
                                                        class="fas fa-edit fa-lg"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#" data-toggle="tooltip"
                                                    data-placement="left" title="Delete!"><i
                                                        class="fas fa-scissors fa-lg"></i></a></li>

                                        </ul>
                                    </td>
                                </tr>
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
@endsection
