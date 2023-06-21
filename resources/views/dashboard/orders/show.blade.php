@extends('layouts.app')
@section('title', 'جميع الطلبات')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> كل الطلبات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الطلبات
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="card">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <div class="media">
                                    <img src="{{ logo($settings['site_logo']) }}" width="100px" alt="company logo">
                                    <div class="media-body">
                                        <ul class="ml-2 px-0 list-unstyled">
                                            <li class="text-bold-800">مطعم ماكس جريل</li>
                                            <li>العنوان</li>
                                            <li>Postel Code</li>
                                            <li>المدينة</li>
                                            <li>البلد</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <h2>فتورة رقم : {{ $order->order_number }}</h2>
                                <ul class="px-0 list-unstyled">
                                    <li>رقم تتبع حالة الطلب : {{ $order->order_traking_number }}</li>
                                    <li>حالة الطلب: {{ $order->order_status }}</li>
                                </ul>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->
                        <!-- Invoice Customer Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            {{-- <div class="col-sm-12 text-center text-md-left">
                            </div> --}}
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <h3 class="text-muted" style="font-weight: bold">فتورة العميل</h3>

                                <ul class="px-0 list-unstyled">
                                    <li>
                                        <span>{{ $order->order_user_name }}</span>
                                    </li>
                                    <li>
                                        <span><a href="mailto:{{ $order->order_user_email }}">{{ $order->order_user_email }}</a></span>
                                    </li>
                                    <li>
                                        <span><a href="tel:{{ $order->order_user_phone }}">{{ $order->order_user_phone }}</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <p>
                                <h3 class="text-muted" style="font-weight: bold">تاريخ الفتورة</h3>
                                <h5>{{ $order->created_at }}</h5>
                                </p>
                            </div>
                        </div>
                        <!--/ Invoice Customer Details -->
                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-2">
                            <div class="row">
                                <div class="table-responsive col-sm-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>المنتج</th>
                                                <th>الكمية المطلوبة</th>
                                                <th class="text-right">السعر</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <p>{{ $product['name'] }}</p>
                                                    </td>
                                                    <td>{{ $product['quantity'] }}</td>
                                                    <td class="text-right">{{ $product['price'] }} EGP</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>المنتج</th>
                                                <th>الكمية المطلوبة</th>
                                                <th class="text-right">السعر</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <p class="lead">إجمالى المنتجات</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>الإجمالى</td>
                                                    <td class="text-right">EGP {{ $order->order_amount }}</td>
                                                </tr>
                                                <tr class="bg-grey bg-lighten-4">
                                                    <td class="text-bold-800">الدفع عن طريق</td>
                                                    <td class="text-bold-800 text-right">{{ $order->order_type }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="text-center">
                                        <p>Authorized person</p>
                                        <img src="{{ asset('assets/images/pages/signature-scan.png') }}" alt="signature"
                                            class="height-100">
                                        <h6>Amanda Orton</h6>
                                        <p class="text-muted">Managing Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Footer -->
                        <div id="invoice-footer">
                            <div class="row">
                                {{-- <div class="col-md-7 col-sm-12">
                                    <h6>Terms &amp; Condition</h6>
                                    <p>You know, being a test pilot isn't always the healthiest business
                                        in the world. We predict too much for the next year and yet far
                                        too little for the next 10.</p>
                                </div> 
                                <div class="col-md-5 col-sm-12 text-center">
                                    <button type="button" class="btn btn-info btn-lg my-1"><i
                                            class="la la-paper-plane-o"></i> Send Invoice</button>
                                </div> --}}
                            </div>
                        </div>
                        <!--/ Invoice Footer -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

