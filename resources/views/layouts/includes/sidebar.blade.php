<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Route::currentRouteNamed('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الرئيسية</span>
                </a>
            </li>
            <li class=" nav-item {{ Route::currentRouteNamed('orders.index') ? 'active open' : '' }}"><a
                    href="{{ route('orders.index') }}"><i class="la la-files-o"></i><span class="menu-title"
                        data-i18n="nav.templates.main">الطلبات</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-files-o"></i><span class="menu-title"
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
                        <a class="menu-item" href="{{ route('products.index') }}" data-i18n="nav.templates.vert.main">كل
                            المنتجات</a>
                    </li>
                    <li class="{{ Route::currentRouteNamed('products.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('products.create') }}"
                            data-i18n="nav.templates.horz.main">إضافة منتج جديدة</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ Route::currentRouteNamed('front') ? 'active open' : '' }}">
                <a href="{{ route('front') }}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الموقع</span>
                </a>
            </li>
        </ul>
    </div>
</div>
