<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Home --}}
            <li class=" nav-item {{ Route::currentRouteNamed('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الرئيسية</span>
                </a>
            </li>
            {{-- Order Management --}}
            {{-- <span>ORDER MANAGEMENT</span> --}}
            
            <li class=" nav-item {{ Route::currentRouteNamed('orders.index') ? 'active open' : '' }}">
                <a href="{{ route('orders.index') }}">
                    <i class="la la-users"></i>
                    <span
                        class="badge badge badge-danger badge-pill float-right">{{ App\Models\Order::where('order_status', 'pending')->count() }}</span>
                    <span class="menu-title" data-i18n="nav.templates.main">الطلبات</span></a>
            </li>
            {{-- Categories --}}
            <li class=" nav-item"><a href="#"><i class="la la-file-o"></i><span class="menu-title"
                        data-i18n="nav.templates.main">الفئات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('categories.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('categories.index') }}"
                            data-i18n="nav.templates.vert.main">كل
                            الفئات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('categories.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('categories.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة فئات جديدة</a>
                    </li>
                </ul>
            </li>
            {{-- Banners --}}
            <li class=" nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title"
                        data-i18n="nav.templates.main">الافتات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('banners.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('banners.index') }}"
                            data-i18n="nav.templates.vert.main">جميع الافتات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('banners.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('banners.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة لافتة جديدة</a>
                    </li>
                </ul>
            </li>
            {{-- Products --}}
            <li class=" nav-item"><a href="#"><i class="la la-files-o"></i><span class="menu-title"
                        data-i18n="nav.templates.main">المنتجات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('products.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('products.index') }}"
                            data-i18n="nav.templates.vert.main">كل
                            المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('products.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('products.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة منتج جديدة</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('uploadProducts.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('uploadProducts.index') }}"
                            data-i18n="nav.templates.horz.main">رفع شيت المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('downloadProducts.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('downloadProducts.index') }}"
                            data-i18n="nav.templates.horz.main">استخراج شيت المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('product.outOfStock') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('product.outOfStock') }}"
                            data-i18n="nav.templates.horz.main">منتجات خارجة عن المخزون</a>
                    </li>
                </ul>
            </li>
            {{-- Offerse --}}
            <li class=" nav-item"><a href="#"><i class="la l
                la-bullhorn"></i><span
                        class="menu-title" data-i18n="nav.templates.main">العروض</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('offers.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('offers.index') }}" data-i18n="nav.templates.vert.main">كل
                            العروض</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('offers.create') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('offers.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة عرض جديد</a>
                    </li>
                </ul>
            </li>
            {{-- Roomes --}}
            <li class=" nav-item"><a href="#"><i class="la la-folder-open"></i><span class="menu-title"
                        data-i18n="nav.templates.main">تفاصيل المطعم</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('rooms.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('rooms.index') }}"
                            data-i18n="nav.templates.vert.main">القاعات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('tables.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('tables.index') }}"
                            data-i18n="nav.templates.horz.main">الطاولات</a>
                    </li>
                </ul>
            </li>
            {{-- Shipping Management --}}
            <li class=" nav-item"><a href="#"><i class="la la-folder-open"></i><span class="menu-title"
                        data-i18n="nav.templates.main">اماكن التوصيل</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('cities.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('cities.index') }}"
                            data-i18n="nav.templates.vert.main">المُدن</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('places.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('places.index') }}"
                            data-i18n="nav.templates.horz.main">المناطق</a>
                    </li>
                </ul>
            </li>
            {{-- Settings --}}
            <li class=" nav-item {{ Route::currentRouteNamed('settings.index') ? 'active open' : '' }}">
                <a href="{{ route('settings.index') }}"><i class="la la-gear"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الإعدادت</span>
                </a>
            </li>
            {{-- Front Website --}}
            <li class=" nav-item {{ Route::currentRouteNamed('front') ? 'active open' : '' }}">
                <a href="{{ route('front') }}" target="_blank"><i class="la la-external-link"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الموقع</span>
                </a>
            </li>
        </ul>
    </div>
</div>
