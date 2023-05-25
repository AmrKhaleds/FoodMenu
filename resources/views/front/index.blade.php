<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MAX GRILL</title>
    <meta name="robots" content="noodp" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" id="dina-font-awesome-css"
        href="{{ asset('front/css/fontawesome/css/font-awesome.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css">
    <link rel="stylesheet" id="dina-style-css-css" href="{{ asset('front/style.css') }}" type="text/css"
        media="all" />
    <!-- favicons -->
    {!! htmlScriptTagJsApi() !!}
</head>

<body class="body-header1"
    style="
      background-color: rgb(23, 24, 25);
      background-image: url('https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/background/bg-5.png');
    ">
    <!-- TOP IMAGE HEADER -->
    <section class="topSingleBkg topPageBkg">
        <div class="item-content-bkg">
            <div class="item-img"
                style="
            background-image: url('https://scontent-hbe1-1.xx.fbcdn.net/v/t39.30808-6/327686260_1268680013683992_3014082107728065644_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeF5rewqi1NdOuvQ3gtr8utntIRNeoxjCx60hE16jGMLHt7OtKuprzKfe05pHCfgM8CMEdafhxj1IkX-MAIoOxRw&_nc_ohc=I47QoLQiY18AX-Q4hYz&_nc_ht=scontent-hbe1-1.xx&oh=00_AfDFGsUEzmk4stvSaQB_BPmRnBLz-eCaXzuQsk-0PJAFSA&oe=645C5209');
          ">
            </div>
            <div class="inner-desc">
                <!-- <h1 class="post-title single-post-title">MAX GRILL</h1> -->
                <!-- <span class="post-subtitle"> Enjoy one of our delicious plates</span> -->
            </div>
        </div>
    </section>
    <!-- /TOP IMAGE HEADER -->
    <!-- MAIN WRAP CONTENT -->
    <section class="menu-3col-content">
        <div class="container">
            <form action="{{ route('request-order') }}" method="post">
                @csrf
                <div id="one" class="row product">
                    <div class="error-container" style="width: 100%;text-align: center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @isset($categories)
                        @foreach ($categories as $category)
                            <div class="col-md-12">
                                <!-- STARTERS -->
                                <div class="categ-name">
                                    <h2>{{ $category->name }}</h2>
                                    <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                                        alt="" title="" style="width: 100px" />
                                </div>
                                <div class="menu-holder row">
                                    @foreach ($category->product as $product)
                                        <div class="menu-container col-md-4"
                                            style="display:flex;flex-direction:row-reverse;flex-wrap: wrap;flex-direction: row-reverse;justify-content: space-between;margin-bottom: 30px;">
                                            <div class="menu-image" style="width: 40%;">
                                                <img src="{{ asset('storage/products/' . $product->photo) }}" width="100%"
                                                    alt=""
                                                    style="border-radius: 20px; float: right;margin-left: 10px;">
                                            </div>
                                            <div class="menu-post " style="width: 60%;">
                                                <div class="menu-post-desc">
                                                    <span class="menu-price"
                                                        style="position: relative;display: block;    text-align: right;">{{ $product->name }}</span>
                                                    <span class="menu-title"
                                                        style="font-size: 20px;
                                                        position: relative;
                                                        display: block;
                                                        text-align: right;
                                                        font-weight: bold;
                                                        ">{{ $product->price }}.00
                                                        EGP</span>
                                                    <div class="menu-text" style="text-align: right;">
                                                        <label for="checkbox-{{ $product->id }}"
                                                            style="margin-right: 10px;">اضف الى قائمة الحجز</label>
                                                        <input id="checkbox-{{ $product->id }}" type="checkbox"
                                                            value="{{ $product->id }}" data-cost="{{ $product->price }}"
                                                            class="checkboxes" name="menu[]">
                                                    </div>
                                                </div>
                                                <p class="menu-desc" style="color: #ff6a6a;">{{ $product->desc }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--menu-3-col-->
                                <!-- /STARTERS -->
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div id="two" class="product" style="display: none">
                    <div id="previous" style="position: relative;left: 13px;top: -35px;">
                        <a href="#" onclick="openCity('one')">
                            <span class="bi bi-arrow-return-left"
                                style="border: 3px solid #987420c9;
                            padding: 5px;
                            border-radius: 20%;
                            font-size: 25px;"></span>
                        </a> BACK
                    </div>
                    <div class="categ-name">
                        <h2>
                            أحجز اكلك دلوقتى من <span style="color: rgb(228, 197, 144);"> ماكس جريل </span>
                        </h2>
                        <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                            alt="" title="" style="width: 200px" />
                    </div>
                    <div class="row" style="direction: rtl;">

                        <div class="col-md-6">
                            <input type="text" name="name" class="reservation-fields inputs"
                                placeholder="الإسم" value="{{ old('name') }}">
                            @error('name')
                                <span id="name_error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="reservation-fields inputs"
                                placeholder="الإيميل" value="{{ old('email') }}">
                            @error('email')
                                <span id="name_error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" class="reservation-fields inputs"
                                placeholder="رقم التلفون" value="{{ old('phone') }}">
                            @error('phone')
                                <span id="name_error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <select name="request_type" id=""
                                style="    width: 100%;
                            color: rgb(255, 255, 255);
                            background: transparent;
                            border: 2px solid white;
                            height: 40px;direction: rtl;">
                                <option value="" selected disabled>نوع الطلب</option>
                                <option value="resturant">داخل المطعم</option>
                                <option value="delivery">ديليفرى</option>
                            </select>
                            @error('request_type')
                                <span id="name_error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <h5>
                                <span class="" id="totalCostCheckout">0</span>.00 EGP
                                <!-- <span class="menu-dots"></span> -->
                                <span class="menu-price">إجمالى الطلبات</span>
                            </h5>
                        </div>
                        {!! htmlFormSnippet() !!}
                        <div class="col-md-12" style="text-align: center">
                            <button type="submit" id="submit">طلب</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--col-md-12-->
            <!--row-->
        </div>
        <!--container-->
    </section>
    {{-- Total Cost --}}
    <a onclick="openCity('two')" id="order" title="أضغط للطلب" style="cursor: pointer">
        <div class="total-cost">
            <span id="totalCost">0</span> EGP: إجمالى الطلبات
        </div>
    </a>
    <!-- /MAIN WRAP CONTENT -->
    <div class="taps">
        <a class="taps" id="next" onclick="openCity('two')" style="">
            احجز دلوقتى
        </a>
        <!-- <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Tokyo</button> -->
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="container">
            <!-- FOOTER COPYRIGHT -->
            <div class="copyright">
                Copyright &copy; 2023, Designed by
                <a href="https://akeissa.com">AKEissa.com</a>
            </div>
            <!-- /FOOTER COPYRIGHT -->
            <!-- FOOTER SCROLL UP -->
            <div class="scrollup">
                <a class="scrolltop" href="#">
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
    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script> --}}
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("product");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            var nextElement = document.getElementById("next");
            if (nextElement.style.display === "none") {
                nextElement.style.display = "block";
            } else {
                nextElement.style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>
    <script>
        // Get all the checkboxes
        var checkboxes = document.querySelectorAll('input[type=checkbox]');
        var totalCostSpan = document.getElementById('totalCost');
        var totalCostCheckout = document.getElementById('totalCostCheckout');
        var totalCost = 0;
        // Loop through each checkbox
        checkboxes.forEach(function(checkbox) {
            // Add an event listener to the checkbox
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    totalCost += parseInt(this.getAttribute('data-cost'));
                } else {
                    totalCost -= parseInt(this.getAttribute('data-cost'));
                }
                // console.log(totalCost);
                totalCostSpan.innerHTML = totalCostCheckout.innerHTML = totalCost;
            });
        });
    </script>
    <script>
        // tippy('#order', {
        //                 content: 'ddd',
        //                 allowHTML: true,
        //                 });
    </script>
</body>

</html>
