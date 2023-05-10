<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Amr Khaled">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/vendors.css') }}">
    @yield('vendor_css')
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/custom-rtl.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/core/colors/palette-gradient.css') }}">
    @yield('page_level_css')
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    @include('layouts.includes.alerts.success')
    @include('layouts.includes.alerts.errors')
    @include('layouts.includes.header')
    @include('layouts.includes.sidebar')
    @yield('content')
    @include('layouts.includes.footer')

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    @yield('vendor_js')
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    @yield('page_level_js')
    <script src="{{ asset('assets/js/scripts/pages/dashboard-sales.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(() => {
                $('.toast').fadeOut();
            }, 3000);
        });
    </script>
    @yield('custom_js')
</body>

</html>
