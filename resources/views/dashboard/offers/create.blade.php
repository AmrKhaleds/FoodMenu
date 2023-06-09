@extends('layouts.app')
@section('vendor_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title', 'انشاء عرض جديد')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> العروض </a>
                                </li>
                                <li class="breadcrumb-item active">@yield('title')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">@yield('title')</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" id="form" method="POST"
                                            action="{{ route('offers.store') }}" enctype="multipart/form-data"
                                            data-dropzone="true">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">اسم العرض</label>
                                                            <input type="text" value="{{ old('name') }}" id="name"
                                                                class="form-control" placeholder="اسم الفئة" name="name">
                                                            @error('name')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="start_date">تاريخ البداية</label>
                                                            <input type="date" class="form-control" name="start_date">
                                                            @error('start_date')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="end_date"> تاريخ النهاية</label>
                                                            <input type="date" class="form-control" name="end_date">
                                                            @error('end_date')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="category">نوع الخصم</label>
                                                            <select name="discount_type" class="form-control"
                                                                id="discount_type">
                                                                <option selected disabled>اختار نوع الخصم</option>
                                                                <option value="percentage">نسبة مئوية</option>
                                                                <option value="price">سعر</option>
                                                            </select>
                                                            @error('discount_type')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="discount">قيمة الخصم</label>
                                                            <input type="number" value="{{ old('discount') }}"
                                                                class="form-control" placeholder="قيمة الخصم"
                                                                name="discount">
                                                            @error('discount')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="category">الفئة</label>
                                                            <select class="form-control" id="category_id">
                                                                <option selected disabled>اختار فئة المنتج</option>
                                                                <option value="" data-category-id="all">كل المنتجات
                                                                </option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->name }}"
                                                                        data-category-id="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="allProducts"></div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
@section('vendor_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#category_id').change(function() {
                var categoryId = $(this).find(':selected').data('category-id');
                $.ajax({
                    url: "{{ route('getProducts') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        categoryId: categoryId
                    },
                    success: function(response) {
                        // Process the retrieved products
                        var productsHtml = ''; // Variable to accumulate product elements
                        $.each(response.data, function(key, value) {
                            var productElement = `
                                <div class="col-md-4 mb-1">
                                    <div class="fancy-checkbox">
                                        <label>
                                            <input id="product-${value.id}" type="checkbox" name="products[]" value="${value.id}">
                                            <span></span>
                                        </label>
                                        <img src="https://smartmart-eg.com/storage/products/17736.jpg" alt="" class="rounded" style="width: 2rem;">
                                        <span>${value.name}</span>
                                    </div>
                                </div>
                                `;

                            productsHtml += productElement; // Accumulate the product elements
                        });

                        $('#allProducts').html(productsHtml); // Set the HTML of #allProducts
                    },
                    error: function(xhr) {
                        // Handle the error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
