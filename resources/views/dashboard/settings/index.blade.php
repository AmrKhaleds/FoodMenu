@extends('layouts.app')
@section('title')
    الإعدادت
@endsection
@section('vendor_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> @yield('title') </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Main</a></li>
                            <li class="breadcrumb-item active">
                                @yield('title')
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">اعدادات الموقع العامة</h4>
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
                                <div class="card-body card-dashboard">
                                    <form class="form" method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>الإعدادات</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="site_name">اسم الموقع</label>
                                                        <input type="text" value="{{ $settings['site_name'] }}" id="site_name"
                                                            class="form-control" placeholder="Project Name"
                                                            name="site_name">
                                                            @error('site_name')
                                                                <span id="name_error" class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="about">من نحن</label>
                                                        <textarea name="about_us" id="about" class="form-control">{{ $settings['about_us'] }}</textarea>
                                                        @error('about')
                                                            <span id="abbr_error" class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="about">Time Zone</label>
                                                        <input type="text" value="{{ config('app.timezone') }}" id="site_name"
                                                            class="form-control" placeholder="Time Zone"
                                                            name="tome_zone" disabled>
                                                        @error('about')
                                                            <span id="abbr_error" class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="logo" class="form-label">اللوجو</label>
                                                        <input class="dropify" type="file" name="site_logo" data-show-errors="true" data-allowed-file-extensions="png jpg jpeg webp" data-default-file="{{ logo($settings['site_logo']) }}">
                                                            @error('logo')
                                                                <span id="direction_error" class="text-danger"> {{ $message }} </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class=""><i class="ft-home"></i> معلومات التواصل</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_email">الإيميل</label>
                                                        <input type="text" value="{{ $settings['email'] }}" id="contact_email"
                                                            class="form-control" placeholder="Project Slug"
                                                            name="email">
                                                            @error('contact_email')
                                                                <span id="name_error" class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_phone">التلفون</label>
                                                        <input type="text" value="{{ $settings['phone'] }}" id="contact_phone"
                                                            class="form-control" placeholder="Industry"
                                                            name="phone">
                                                            @error('contact_phone')
                                                                <span id="name_error" class="text-danger"></span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class=""><i class="ft-home"></i> اعدادت الفوتر</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="copyright">حقوق النشر</label>
                                                        <input type="text" value="{{ $settings['copyright'] }}" id="copyright"
                                                            class="form-control" placeholder="Project Slug"
                                                            name="copyright">
                                                            @error('copyright')
                                                                <span id="name_error" class="text-danger"></span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> save
                                            </button>
                                        </div>
                                    </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('custom_js')
<script>
        $('.dropify').dropify();
    </script>
@endsection