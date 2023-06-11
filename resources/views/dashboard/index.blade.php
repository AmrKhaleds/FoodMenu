@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-directional-primary pull-up">
                            <a href="{{ route('orders.index') }}">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-speech text-white font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-white text-right">
                                                <h3 class="text-white">{{ App\Models\Order::count() }}</h3>
                                                <span>الطلبات</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-directional-primary pull-up">
                            <a href="{{ route('categories.index') }}">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-rocket text-white font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-white text-right">
                                                <h3 class="text-white">{{ App\Models\Category::count() }}</h3>
                                                <span>الفئات</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12">
                        <div class="card bg-gradient-directional-primary pull-up">
                            <a href="{{ route('products.index') }}">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-pie-chart text-white font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-white text-right">
                                                <h3 class="text-white">{{ App\Models\Product::count() }}</h3>
                                                <span>المنتجات</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-xl-12">
                    <div class="card" style="    height: 500px;
                    margin-bottom: 166px;
                    overflow: auto;
                }">
                        <div class="card-header">
                            <h4 class="card-title">إحصائيات المبيعات</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">إجمالى المبيعات : 654 EGP</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>عدد الطلبات</th>
                                            <th>الإجمالى (EGP)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr class="bg-success bg-lighten-5">
                                                <td>{{ $order->order_number }}</td>
                                                <td><i class="cc BTC-alt"></i> {{ count($order->menu) }}</td>
                                                <td>{{ $order->order_number }} EGP</td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
