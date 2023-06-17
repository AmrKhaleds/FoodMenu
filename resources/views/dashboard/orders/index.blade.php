@extends('layouts.app')
@section('title', 'جميع الطلبات')
@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection
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
                <!-- DOM - jQuery events table -->
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">كل الطلبات </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a>
                                            </li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered file-export" id="order">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>رقم الطلب</th>
                                                    <th>اسم العميل</th>
                                                    <th>تلفون العميل</th>
                                                    <th>من خلال</th>
                                                    <th>تاريخ الطلب</th>
                                                    <th>اكتمل</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($orders)
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ ++$loop->index }}</td>
                                                            <td>{{ $order->order_number }}</td>
                                                            <td>{{ $order->order_user_name }}</td>
                                                            <td><a href="https://wa.me/{{ $order->order_user_phone }}/?text=تم استلام طلبك بنجاح" target="_blank">{{ $order->order_user_phone }}</a></td>
                                                            <td><span class="badge badge badge-pill badge-info mr-2">{{ $order->order_type }}</span></td>
                                                            <td><span style="color: red">{{ $order->created_at->diffForHumans() }}</span> <br> {{ $order->created_at }}</td>
                                                            <td>
                                                                <div class="container">
                                                                    <label class="switch">
                                                                        <input type="checkbox" name="status" class="status"
                                                                            data-order-id="{{ $order->id }}"
                                                                            @if ($order->status == true) checked @endif />
                                                                        <div></div>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example"
                                                                    style="flex-wrap: nowrap;">
                                                                    <a href="{{ route('orders.show', $order->id) }}"
                                                                        class="btn btn-primary btn-sm rounded-5 mr-1">
                                                                        <i class="la la-eye"></i>
                                                                    </a>
                                                                    <form action="{{ route('orders.destroy', $order->id) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm rounded-5 mr-1"><i
                                                                                class="la la-remove"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>رقم الطلب</th>
                                                    <th>اسم العميل</th>
                                                    <th>تلفون العميل</th>
                                                    <th>من خلال</th>
                                                    <th>تاريخ الطلب</th>
                                                    <th>اكتمل</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('vendor_js')
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.flash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.print.min.js') }}" type="text/javascript"></script>

@endsection
@section('page_level_js')
    <script src="{{ asset('assets/js/scripts/tables/datatables/datatable-advanced.js') }}" type="text/javascript"></script>
@endsection
@section('custom_js')
    <script>
        $('.status').on('click', function() {
            var order_id = $(this).data('order-id');
            var isChecked = $(this).prop('checked') ? 1 : 0; // Get the checked state and convert it to 1 or 0
            $.ajax({
                url: '/dashboard/orders/updateOrderStatus',
                type: 'POST',
                data: {
                    order_id: order_id,
                    status: isChecked // Pass the updated status as data
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        Toast.fire({
                            icon: 'success',
                            title: response.msg
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.msg
                        });
                    }
                    // Handle UI updates based on the updated status
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection