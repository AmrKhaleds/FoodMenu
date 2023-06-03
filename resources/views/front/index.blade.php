@extends('layouts.front')
@section('title', $settings['site_name'])
@section('content')
    <!-- TOP IMAGE HEADER -->
    <section class="topSingleBkg topPageBkg">
        <div class="item-content-bkg">
            <div class="item-img"
                style="background-image: url('http://maxgrill.akeissa.com/storage/327686260_1268680013683992_3014082107728065644_n.jpg')">
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
        <!--container-->
        <div class="container">
            <form action="{{ route('request-order') }}" method="post">
                @csrf
                <input type="hidden" name="order_number">
                <div id="one" class="row product tab-content">
                    <section class="categories" id="categories" style="">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist" style="flex-wrap: nowrap;">
                            @foreach ($categories as $key => $category)
                                <li role="nav-link">
                                    <a href="#{{ \Str::snake($category->slug, '-') }}"
                                        aria-controls="{{ \Str::snake($category->slug, '-') }}" role="tab"
                                        data-toggle="pill" class="cat-all nav-link {{ $key == 0 ? 'active' : '' }}"
                                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </section>
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
                        @foreach ($categories as $key => $category)
                            <div role="tabpanel" class="col-md-12 tab-pane fade {{ $key == 0 ? 'active show' : '' }}"
                                aria-labelledby="{{ \Str::snake($category->slug, '-') }}"
                                id="{{ \Str::snake($category->slug, '-') }}">
                                <!-- STARTERS -->
                                <div class="categ-name">
                                    <h2>{{ $category->name }}</h2>
                                    <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                                        alt="" title="" style="width: 100px" />
                                </div>
                                <div class="menu-holder row">
                                    @foreach ($category->product as $product)
                                        @if ($product->status)
                                            <div class="menu-container col-md-4"
                                                style="display:flex;flex-direction:row-reverse;flex-wrap: wrap;flex-direction: row-reverse;justify-content: space-between;margin-bottom: 30px;">
                                                <div class="menu-image" style="width: 40%;">
                                                    <img src="{{ asset('storage/products/' . $product->photo) }}"
                                                        width="100%" alt=""
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
                                                                style="margin-right: 10px;">اضف الى السلة</label>
                                                            <input id="checkbox-{{ $product->id }}" type="checkbox"
                                                                value="{{ $product->id }}"
                                                                data-product-id="{{ $product->id }}"
                                                                data-cost="{{ $product->price }}" class="checkboxes"
                                                                name="menu[]"
                                                                @foreach ($getContent as $id => $item)
                                                                    @if ($product->id == $id)
                                                                        checked
                                                                    @endif @endforeach>
                                                        </div>
                                                    </div>
                                                    <p class="menu-desc" style="color: #ff6a6a;">{{ $product->desc }}</p>
                                                </div>
                                            </div>
                                        @endif
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
                            <input type="text" name="name" class="reservation-fields inputs" placeholder="الإسم"
                                value="{{ old('name') }}">
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
                                <option value="resturant" {{ old('request_type') == 'resturant' ? 'selected' : '' }}>
                                    داخل المطعم</option>
                                <option value="delivery" {{ old('request_type') == 'delivery' ? 'selected' : '' }}>
                                    ديليفرى</option>
                            </select>
                            @error('request_type')
                                <span id="name_error" class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <h5>
                                <span class="" id="totalCostCheckout">{{ $subTotal }}</span> EGP
                                <!-- <span class="menu-dots"></span> -->
                                <span class="menu-price">إجمالى الطلبات</span>
                            </h5>
                        </div>
                        {{-- {!! htmlFormSnippet() !!} --}}
                        <div class="col-md-12" style="text-align: center">
                            <button type="submit" id="submit">طلب</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--container-->
    </section>
    {{-- Total Cost --}}
    <a onclick="openCity('two')" id="order" title="أضغط للطلب" style="cursor: pointer">
        <div class="total-cost">
            {{-- <div></div> --}}


            <span id="totalCost">{{ $subTotal }}</span> EGP : اطلب الأن
            <span>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span id="cartItemCount" style="background: red;
                /* width: 15px; */
                /* height: 15px; */
                display: inline-block;
                border-radius: 50%;
                position: relative;
                right: 7px;
                top: -9px;
                line-height: 1;
                padding: 3px;
                text-align: center;
                font-size: 13px;">{{ count($getContent) }}</span>    
            </span>
        
        </div>
    </a>
    <!-- /MAIN WRAP CONTENT -->
    <div class="taps">
        <a class="taps" id="next" onclick="openCity('two')" style="">
            اطلب الأن
        </a>
    </div>
@endsection
@section('custom_js')
    <script>
        // Taps Switch
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
        var cartItemCount = document.getElementById('cartItemCount');
        var totalCostCheckout = document.getElementById('totalCostCheckout');
        var totalCost = 0;
        // Loop through each checkbox
        checkboxes.forEach(function(checkbox) {
            // Add an event listener to the checkbox
            const productId = checkbox.dataset.productId;
            checkbox.addEventListener('change', function()
            {
                if (this.checked)
                {
                    $.ajax({
                        url: '/cart',
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: productId
                        },
                        success: function(res) {
                            console.log(res);
                            totalCostSpan.innerHTML = totalCostCheckout.innerHTML = res
                            .subTotal;
                            cartItemCount.innerHTML = parseInt(cartItemCount.innerHTML) + 1; 
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                }else
                {
                    $.ajax({
                        url: '/cart/' + productId,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            console.log(res);
                            totalCostSpan.innerHTML = totalCostCheckout.innerHTML = res.subTotal;
                            cartItemCount.innerHTML = parseInt(cartItemCount.innerHTML) - 1; 
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                }
            });
        });
    </script>
@endsection
