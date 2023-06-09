<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Amr Khaled">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ logo($settings['site_logo']) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ logo($settings['site_logo']) }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/vendors.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.11/sweetalert2.min.css"
        integrity="sha512-t00UpSiOSq/o/rWkM0Fv+aD9FjlOzEEc4qLqvGqh0Do1RgvMEKmUYYo5Yb8Te77ux9wkTdoDVD0vwQLJMRLZCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    
    @include('sweetalert::alert')
    @include('layouts.includes.header')
    @include('layouts.includes.sidebar')
    @yield('content')
    @include('layouts.includes.footer')

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.7/jquery.timeago.min.js"
        integrity="sha512-RlGrSmkje9EE/FXpJKWf0fvOlg4UULy/blvNsviBX9LFwMj/uewXVoanRbxTIRDXy/0A3fBQppTmJ/qOboJzmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('vendor_js')
    <!-- BEGIN VENDOR JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.11/sweetalert2.min.js"
        integrity="sha512-N41zI1J3Fe0qxUlhBhZ+dBO2po5k7Vbed92xNADfBeNAqpRsTZiY2+5bBl7u2RLnF6Ngf9xenn9mr53X2uSiPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    @yield('page_level_js')
    <!-- END PAGE LEVEL JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Toaster Settings
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            showCloseButton: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
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
