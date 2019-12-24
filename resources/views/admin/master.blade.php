<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching | Home</title>
    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fa/css/all.min.css')}}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/animate.css')}}">
    <!--    Owl Carosel Stylesheets-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.theme.default.css')}}">
    <!--    Magnetic Popup-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/magnific-popup/css/magnific-popup.css')}}">
    <!--    Bootstrap-4.3 Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/sub-dropdown.css')}}">
    <!--    Data Table CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/fixedHeader.bootstrap4.min.css')}}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!--    Favicon-->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">
</head>
<body>

@include('admin.includes.header')

@yield('main-content')

@include('admin.includes.footer')

<!--    jQuery-->
<script src="{{asset('admin/assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<!--    magnific popup-->
<script src="{{asset('admin/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
<!--    Carousel-->
<script src="{{asset('admin/assets/plugins/owl-carosel/js/owl.carousel.min.js')}}"></script>
<!--    Bootstrap-4.3-->
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/sub-dropdown.js')}}"></script>
<!--Data table-->
<script src="{{asset('admin/assets/plugins/data-table/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/data-table/js/dataTables.fixedHeader.min.js')}}"></script>
<!--    Theme Script-->
<script src="{{asset('admin/assets/js/script.js')}}"></script>
</body>
</html>
