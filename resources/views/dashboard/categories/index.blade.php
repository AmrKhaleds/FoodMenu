@extends('layouts.app')
@section('title', 'جميع الفئات')
@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> كل الفئات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الفئات
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <a class="btn btn-outline-primary mb-1" href="{{ route('categories.create') }}">إضافة فئة جديدة</a>
                <!-- DOM - jQuery events table -->
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">كل الفئات </h4>
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
                                        <table class="table table-striped table-bordered file-export" id="categories">
                                            <thead>
                                                <tr>
                                                    <th>اسم الفئة</th>
                                                    <th>الحالة</th>
                                                    <th>عدد المنتجات</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($categories)
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td>{{ $category->name }}</td>
                                                            <td>
                                                                <div class="container">
                                                                    <label class="switch">
                                                                        <input type="checkbox" name="status" class="status"
                                                                            data-category-id="{{ $category->id }}"
                                                                            @if ($category->status == true) checked @endif />
                                                                        <div></div>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>{{ count($category->product) }}</td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example"
                                                                    style="flex-wrap: nowrap;">
                                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                                        class="btn btn-secondary btn-sm rounded-5 mr-1">
                                                                        <i class="la la-edit"></i>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('categories.destroy', $category->id) }}"
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
                                                    <th>اسم الفئة</th>
                                                    <th>الحالة</th>
                                                    <th>عدد المنتجات</th>
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
            var categoryId = $(this).data('category-id');
            var isChecked = $(this).prop('checked') ? 1 : 0; // Get the checked state and convert it to 1 or 0
            $.ajax({
                url: '/dashboard/update-category-status',
                type: 'POST',
                data: {
                    category_id: categoryId,
                    status: isChecked // Pass the updated status as data
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        toastr.success(response.msg, 'Success');
                    } else {
                        toastr.success(response.msg, 'Success');
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
