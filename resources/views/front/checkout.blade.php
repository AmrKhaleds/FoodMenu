@extends('layouts.front')
@section('title', $settings['site_name'])
@section('content')
    <div class="container">
        <div class="categ-name">
            <h2>
                هتاكل منين انهاردة<span style="color: rgb(228, 197, 144);">....؟</span>
            </h2>
            <img src="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/images/icons/separator.svg"
                alt="" title="" style="width: 200px" />
        </div>
        <div class="forms">
            <div class="wrapper">
                <input type="radio" name="form" value="1" id="option-1" />
                <input type="radio" name="form" value="2" checked id="option-2" />

                <label for="option-1" class="option option-1">
                    <div class="dot"></div>
                    <span>من المطعم</span>
                </label>
                <label for="option-2" class="option option-2">
                    <div class="dot"></div>
                    <span>من البيت</span>
                </label>
            </div>
            <div class="row">
                @livewire('checkout-items')
                @if(count($items) > 0)
                    {{-- Resturant --}}
                    <form action="{{ route('checkout.restaurant') }}" method="post" id="form1" class="desc col-md-8" style="display: none">
                        @csrf
                        <div class="row">
                            <div class="row" style="direction: rtl;">
                                <div class="col-md-6">
                                    <input type="text" name="order_user_name" class="reservation-fields inputs"
                                        placeholder="الإسم" value="{{ old('order_user_name') }}">
                                    @error('order_user_name')
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
                                    height: 40px;direction: rtl;
                                    margin-bottom: 16px;">
                                        <option value="" selected disabled>صالة رقم</option>
                                        <option value="resturant"
                                            {{ old('request_type') == 'resturant' ? 'selected' : '' }}>
                                            داخل المطعم</option>
                                        <option value="delivery" {{ old('request_type') == 'delivery' ? 'selected' : '' }}>
                                            ديليفرى</option>
                                    </select>
                                    @error('request_type')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select name="request_type" id=""
                                        style="    width: 100%;
                                    color: rgb(255, 255, 255);
                                    background: transparent;
                                    border: 2px solid white;
                                    height: 40px;direction: rtl;
                                    margin-bottom: 16px;">
                                        <option value="" selected disabled>طاولة رقم</option>
                                        <option value="resturant"
                                            {{ old('request_type') == 'resturant' ? 'selected' : '' }}>
                                            داخل المطعم</option>
                                        <option value="delivery" {{ old('request_type') == 'delivery' ? 'selected' : '' }}>
                                            ديليفرى</option>
                                    </select>
                                    @error('request_type')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12" style="text-align: center">
                                    <button type="submit" id="submit" {{ count($items) == 0 ? "disabled" : "" }}>طلب</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- Deleviry --}}
                    <form action="{{ route('checkout.delivery') }}" method="post" id="form2" class="desc col-md-8">
                        @csrf
                        <div class="row">
                            <div class="row " style="direction: rtl;">
                                <div class="col-md-4">
                                    <input type="text" name="order_user_name" class="reservation-fields inputs"
                                        placeholder="الإسم" value="{{ old('order_user_name') }}">
                                    @error('order_user_name')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input type="email" name="order_user_email" id="email"
                                        class="reservation-fields inputs" placeholder="الإيميل"
                                        value="{{ old('order_user_email') }}">
                                    @error('order_user_email')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="order_user_phone" id="phone"
                                        class="reservation-fields inputs" placeholder="رقم التلفون"
                                        value="{{ old('order_user_phone') }}">
                                    @error('order_user_phone')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select name="order_user_country" id=""
                                        style="    width: 100%;
                                    color: rgb(255, 255, 255);
                                    background: transparent;
                                    border: 2px solid white;
                                    height: 40px;direction: rtl;
                                    margin-bottom: 16px;">
                                        <option value="" selected disabled>البلد المتاحة لخدمة التوصيل</option>
                                        <option value="resturant"
                                            {{ old('request_type') == 'resturant' ? 'selected' : '' }}>
                                            دمنهور</option>
                                        <option value="delivery"
                                            {{ old('request_type') == 'delivery' ? 'selected' : '' }}>
                                            اسكندرية</option>
                                    </select>
                                    @error('order_user_country')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select name="order_user_place" id=""
                                        style="    width: 100%;
                                    color: rgb(255, 255, 255);
                                    background: transparent;
                                    border: 2px solid white;
                                    height: 40px;direction: rtl;
                                    margin-bottom: 16px;">
                                        <option value="" selected disabled>المنطقة المتاحة لخدمة التوصيل</option>
                                        <option value="resturant"
                                            {{ old('request_type') == 'resturant' ? 'selected' : '' }}>
                                            شارع المحافظة</option>
                                        <option value="delivery"
                                            {{ old('request_type') == 'delivery' ? 'selected' : '' }}>
                                            ستانلى</option>
                                    </select>
                                    @error('request_type')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea type="text" name="order_user_address" id="" class="reservation-fields inputs"
                                        placeholder="العنوان بالمنطقة المختارة بالتفصيل" style="height: 150px">{{ old('order_user_address') }}</textarea>
                                    @error('order_user_address')
                                        <span id="name_error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12" style="text-align: center">
                                    <button type="submit" id="submit">طلب</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
        </div>
    </div>
</div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $("input[name$='form']").click(function() {
                var test = $(this).val();

                $("form.desc").hide();
                $("#form" + test).show();
            });
        });
    </script>
@endsection
