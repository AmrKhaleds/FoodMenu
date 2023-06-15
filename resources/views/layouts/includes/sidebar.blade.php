<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Route::currentRouteNamed('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الرئيسية</span>
                </a>
            </li>
            <li class=" nav-item {{ Route::currentRouteNamed('orders.index') ? 'active open' : '' }}">

                <a href="{{ route('orders.index') }}">
                    <i class="la la-users"></i>
                    <span class="badge badge badge-danger badge-pill float-right">{{ App\Models\Order::where('order_status', false)->count() }}</span>
                    <span class="menu-title" data-i18n="nav.templates.main">الطلبات</span></a>
            </li>
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
                        <a class="menu-item" href="{{ route('uploadProducts.index') }}" data-i18n="nav.templates.horz.main">رفع شيت المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('downloadProducts.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('downloadProducts.index') }}" data-i18n="nav.templates.horz.main">استخراج شيت المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('databaseDestroy.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('databaseDestroy.index') }}" data-i18n="nav.templates.horz.main">مسح قاعدة بيانات المنتجات</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la l
                la-bullhorn"></i><span class="menu-title"
                        data-i18n="nav.templates.main">العروض</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::currentRouteNamed('offers.index') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('offers.index') }}"
                            data-i18n="nav.templates.vert.main">كل
                            العروض</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('offers.create') ? 'active open' : '' }}">
                        <a class="menu-item" href="{{ route('offers.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة عرض جديد</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ Route::currentRouteNamed('settings.index') ? 'active open' : '' }}">
                <a href="{{ route('settings.index') }}"><i class="la la-gear"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الإعدادت</span>
                </a>
            </li>
            <li class=" nav-item {{ Route::currentRouteNamed('front') ? 'active open' : '' }}">
                <a href="{{ route('front') }}" target="_blank"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الموقع</span>
                </a>
            </li>
        </ul>
    </div>
</div>
