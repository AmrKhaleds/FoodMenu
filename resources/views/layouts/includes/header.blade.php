    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="{{ route('dashboard') }}">
                            <img class="brand-logo" alt="modern admin logo"
                                src="{{ asset('assets/images/logo/logo.png') }}">
                            <h3 class="brand-text">{{ $settings['site_name'] }}</h3>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                            data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                                data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">

                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item">
                            <a id="notification-bell" class="nav-link nav-link-label" href="#"
                                data-toggle="dropdown" aria-expanded="true"><i class="ficon ft-bell"></i>
                                <span id="counter"
                                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" style="    padding: 0 10px;">@if($notificationCount > 9) +9 @else {{ $notificationCount }} @endif</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right ">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">Notifications</span>
                                    </h6>

                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">
                                        <span id="newNotificationCounter">{{ $notificationCount }}</span>New
                                    </span>
                                </li>
                                <li id="notification-element"
                                    class="scrollable-container media-list w-100 ps-container ps-theme-dark"
                                    data-ps-id="77f2b204-3d4d-5921-d457-ead66966b045">
                                    @forelse ($notifications as $notification)
                                        <a href="{{ $notification->link }}" target="_blank">
                                            <div class="media"
                                                @if ($notification->is_read == 0) style="background: #fafb8f9e;" @endif>
                                                <div class="media-left align-self-center"><i
                                                        class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">الطلب رقم : {{ $notification->title }}
                                                    </h6>
                                                    <p class="notification-text font-small-3 text-muted">
                                                        {{ $notification->message }}</p>
                                                    <small>
                                                        <time class="media-meta text-muted date-time"
                                                            datetime="{{ $notification->created_at }}">{{ $notification->created_at }}</time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                    There is no Notification Yet
                                    @endforelse
                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <a class="dropdown-item text-muted text-center" href="{{ route('notification.index') }}">Read all
                                        notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <span class="mr-1">مرحباً,
                                    {{ auth()->user()->name }}
                                </span>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="ft-power"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
