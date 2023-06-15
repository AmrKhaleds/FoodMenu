@extends('layouts.front')
@section('title', $settings['site_name'])
@section('content')
<div class="container">
    <form action="" method="post">
        @csrf
            <div class="categ-name">
                <h2>
                    أحجز اكلك دلوقتى من <span style="color: rgb(228, 197, 144);"> ماكس جريل </span>
                </h2>
                <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                    alt="" title="" style="width: 200px" />
            </div>
            <div class="row">
                @if(count($items) > 0)
                    <div class="orderItems col-xl-4 ">
                        <ul>
                            @foreach ($items as $item)
                                <li class="item">
                                    <div class="right">
                                        <img class="cart-photo" src="{{ asset('storage/products/' . $item->attributes->photo) }}" alt="">
                                    </div>
                                    <div class="cart-info">
                                        <span class="product-name">
                                            {{ $item->name }}
                                        </span>
                                        <span class="product-price">
                                            {{ $item->price }} EGP
                                        </span>
                                        <span class="product-quantity">
                                            {{ $item->quantity }} وحدة
                                        </span>
                                    </div>
                                    <div class="remvoe">x</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                
                @else
                    <div class="no-products" style="width: 100%;color: rgb(253, 87, 87);text-align: center;margin-bottom: 20px;">
                        <span>* لا يوجد منتجات فى السلة *</span>
                        <br>
                        <span>يرجى اختيار على الأقل منتج واحد لإكمال الطلب</span>
                    </div>
                @endisset
                <div class="row col-xl-{{count($items) > 0 ? "8" : "12"}}" style="direction: rtl;">
        
                    <div class="col-md-6">
                        <input type="text" name="order_user_name" class="reservation-fields inputs"
                            placeholder="الإسم" value="{{ old('order_user_name') }}">
                        @error('order_user_name')
                            <span id="name_error" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="order_user_email" id="email" class="reservation-fields inputs"
                            placeholder="الإيميل" value="{{ old('order_user_email') }}">
                        @error('order_user_email')
                            <span id="name_error" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="order_user_phone" id="phone"
                            class="reservation-fields inputs" placeholder="رقم التلفون"
                            value="{{ old('order_user_phone') }}">
                        @error('order_user_phone')
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
                            <span class="" id="totalCostCheckout"></span> EGP
                            <!-- <span class="menu-dots"></span> -->
                            <span class="menu-price">إجمالى الطلبات</span>
                        </h5>
                    </div>
                    <div class="col-md-12" style="text-align: center">
                        <button type="submit" id="submit">طلب</button>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
