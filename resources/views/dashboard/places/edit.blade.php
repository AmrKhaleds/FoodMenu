@extends('layouts.app')
@section('title', 'الأماكن')
@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item">اماكن التوصيل
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
                                    <h4 class="card-title" id="basic-layout-form">تحديث مكان</h4>
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
                                            action="{{ route('places.update', $place->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">اسم المكان</label>
                                                            <input type="text" value="{{ $place->name }}" id="name"
                                                                class="form-control" placeholder="اسم المكان"
                                                                name="name">
                                                            @error('name')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="tax">سعر التوصيل EGP</label>
                                                            <input type="text" value="{{ $place->tax  }}" id="tax"
                                                                class="form-control" placeholder="سعر التوصيل"
                                                                name="tax">
                                                            @error('tax')
                                                                <span id="name_error"
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="city_id">المدينة</label>
                                                        <select class="form-control" id="city_id" name="city_id">
                                                            <option selected disabled>اختار المدينة</option>
                                                            @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}" {{ $city->id == $place->city->id  ? 'selected' : '' }}>
                                                                    {{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city_id')
                                                            <span id="name_error"
                                                                class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
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