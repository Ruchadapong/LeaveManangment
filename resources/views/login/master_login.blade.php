<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- icon website -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/site_logo.png')}}">
    <!-- Fontfaces CSS-->
    <link href="{{asset('dashboard/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('dashboard/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('dashboard/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}"
        rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/css/passtrength.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('dashboard/css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('dashboard/css/mystyle.css')}}" rel="stylesheet" media="all">

    <script src="{{asset('dashboard/js/sweetalert.min.js')}}"></script>

</head>

<body class="animsition">

    @yield('content')

    <!-- Jquery JS-->
    <script src="{{asset('dashboard/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('dashboard/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('dashboard/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('dashboard/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.passtrength.min.js')}}"></script>
    <script src="{{asset('dashboard/js/my.script.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('dashboard/js/main.js')}}"></script>

    @yield('script-login')


</body>

</html>
<!-- end document-->
