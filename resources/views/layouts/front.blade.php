<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="robots" content="noodp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" id="dina-bootstrap-css-css" href="{{ asset('front/css/bootstrap/css/bootstrap.min.css') }}"
        type="text/css" media="all" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" id="dina-font-awesome-css"
        href="{{ asset('front/css/fontawesome/css/font-awesome.min.css') }}" type="text/css" media="all" />
    {{-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" /> --}}
    <!-- Main CSS File -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css">
    <link rel="stylesheet" id="dina-style-css-css" href="{{ asset('front/style.css') }}" type="text/css" media="all" />
    <!-- favicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css" integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body class="body-header1"
    style="background-color: rgb(23, 24, 25); background-image: url('https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/background/bg-5.png');">

    @include('sweetalert::alert')
    @include('front.parts.imageHeader')
    @yield('content')
    <footer>
        <div class="container">
            <!-- FOOTER COPYRIGHT -->
            <div class="copyright">
                Copyright &copy; 2023, Designed by
                <a href="https://akeissa.com" style="color: rgb(228, 197, 144);;">{{ $settings['copyright'] }}</a>
            </div>
            <!-- /FOOTER COPYRIGHT -->
            <!-- FOOTER SCROLL UP -->
            <div class="scrollup">
                <a class="scrolltop" href="#" id="scroll-up-button">
                    <i class="fas fa-chevron-up"></i>
                </a>
            </div>
            <!-- /FOOTER SCROLL UP -->
        </div>
        <!--container-->
    </footer>
    <!-- /FOOTER -->
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script src="{{ asset('front/js/jquery.js') }}"></script>
    <script src="{{ asset('front/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('front/css/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/css/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- MAIN JS -->
    <script src="{{ asset('front/js/init.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var scrollUpButton = document.getElementById('scroll-up-button');

            function handleScroll() {
                var viewHeight = window.innerHeight;
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (viewHeight === 0 || scrollTop === 0) {
                    scrollUpButton.style.display = 'none';
                } else {
                    scrollUpButton.style.display = 'block';
                }
            }

            window.addEventListener('scroll', handleScroll);
            window.addEventListener('resize', handleScroll);

            // Initial check on page load
            handleScroll();
        });
    </script>
    @yield('custom_js')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.js" integrity="sha512-JbRQ4jMeFl9Iem8w6WYJDcWQYNCEHP/LpOA11LaqnbJgDV6Y8oNB9Fx5Ekc5O37SwhgnNJdmnasdwiEdvMjW2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('sessionCleared', function () {
                // Reload the page
                location.reload();
            });
        });
    </script>
    @livewireScripts
</body>

</html>
