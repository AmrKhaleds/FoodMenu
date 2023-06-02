<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Amr Khaled">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    {{-- @include('layouts.includes.alerts.success')
    @include('layouts.includes.alerts.errors') --}}

    @include('layouts.includes.header')
    @include('layouts.includes.sidebar')
    @yield('content')
    @include('layouts.includes.footer')

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.7/jquery.timeago.min.js"
        integrity="sha512-RlGrSmkje9EE/FXpJKWf0fvOlg4UULy/blvNsviBX9LFwMj/uewXVoanRbxTIRDXy/0A3fBQppTmJ/qOboJzmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('vendor_js')
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    @yield('page_level_js')
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">
        toastr.options = {
            progressBar: true,
            positionClass: 'toast-bottom-right',
            rtl: true,
        };
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        // Set Notification Time Ago
        jQuery(document).ready(function() {
            $("time.date-time").timeago();
        });
    </script>
    <script>
        // Mark All As Read when hitting notification bell
        $('#notification-bell').on('click', function() {
            $.ajax({
                url: '/dashboard/mark-all-as-read', // Replace with your Laravel route or controller method URL
                type: 'POST',
                dataType: 'json',
                data: {
                    // Pass any required data here, such as user authentication details
                },
                success: function(response) {
                    // Handle the response from the server, if needed
                    const notify_input = document.getElementById('counter');
                    notify_input.innerHTML = 0;

                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
        });
    </script>
    @yield('custom_js')
</body>

</html>
