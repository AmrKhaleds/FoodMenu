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
                                    <img src="{{ asset('assets/images/logo/logo.png') }}" width="100px" alt="company logo"
                                        class="" style="background: #000;padding: 9px;border-radius: 20px;">
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
                                    <li>من خلال</li>
                                    <li class="lead text-bold-800">{{ $order->request_type }}</li>
                                </ul>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->
                        <!-- Invoice Customer Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-12 text-center text-md-left">
                                <h3 class="text-muted" style="font-weight: bold">فتورة العميل</h3>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <ul class="px-0 list-unstyled">
                                    <li class="text-bold-800">
                                        <h4 style="font-weight: bold">{{ $order->name }}</h4>
                                    </li>
                                    <li>
                                        <h4 style="font-weight: bold">{{ $order->email }}</h4>
                                    </li>
                                    <li>
                                        <h4 style="font-weight: bold">{{ $order->phone }}</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <p>
                                <h3 class="text-muted" style="font-weight: bold">تاريخ الفتورة</h3>
                                <h4 style="font-weight: bold">{{ $order->created_at }}</h4>
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
                                                <th class="text-right">السعر</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $x = 1;
                                            @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{ $x }}</th>
                                                    <td>
                                                        <p>{{ $product['name'] }}</p>
                                                        <p class="text-muted">{{ $product['desc'] }}</p>
                                                    </td>
                                                    <td class="text-right">{{ $product['price'] }} EGP</td>
                                                </tr>
                                                @php
                                                    $x++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-7 col-sm-12 text-center text-md-left">
                                    <p class="lead">Payment Methods:</p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-borderless table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>Bank name:</td>
                                                        <td class="text-right">ABC Bank, USA</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Acc name:</td>
                                                        <td class="text-right">Amanda Orton</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IBAN:</td>
                                                        <td class="text-right">FGS165461646546AA</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SWIFT code:</td>
                                                        <td class="text-right">BTNPP34</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-5 col-sm-12">
                                    <p class="lead">إجمالى المنتجات</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>الإجمالى</td>
                                                    <td class="text-right">EGP {{ $totalPrice }}</td>
                                                </tr>
                                                <tr class="bg-grey bg-lighten-4">
                                                    <td class="text-bold-800">الدفع من خلال</td>
                                                    <td class="text-bold-800 text-right">{{ $order->request_type }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

