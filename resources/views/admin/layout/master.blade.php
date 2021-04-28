<!doctype html>
<html lang="en">

<head>
    <base href="{{ asset('dashboard') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title') | Admin - FoodMate</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="tailwind.min.css" rel="stylesheet">

    <link href="main.css" rel="stylesheet">
    <link href="my_style.css" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle"
                                             src="../front/data-images/user/{{ Auth::user()->image ?? '_default-user.png' }}"
                                             alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2"
                                                     style="background-image: url('../dashboard/assets/images/dropdown-header/city3.jpg');">
                                                </div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle"
                                                                     src="../front/data-images/user/{{ Auth::user()->image ?? '_default-user.png' }}"
                                                                     alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div
                                                                    class="widget-heading">{{ Auth::user()->user_name }}</div>
                                                                <div class="widget-subheading opacity-8">
                                                                    {{ Auth::user()->restaurant->name ?? '' }}
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <a href="../admin/logout"
                                                                   class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                                    Logout
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">{{ Auth::user()->user_name }}</div>
                                <div class="widget-subheading">
                                    Restaurant:
                                    <span class="font-weight-bold">
                                        {{ Auth::user()->restaurant->name ?? '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main">
        <div class="app-sidebar sidebar-shadow" style="min-width: 250px; width: 250px">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                    <span>
                        <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading"></li>

                        <ul>
                            <li>
                                <a href="../admin"
                                   class="{{ (request()->segment(2) == '' || request()->segment(2) == 'dashboard') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="../admin/report"
                                   class="{{ (request()->segment(2) == 'report') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Report
                                </a>
                            </li>
                            <li>
                                <a href="../admin/order"
                                   class="{{ (request()->segment(2) == 'order') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Order
                                </a>
                            </li>
                            <li>
                                <a href="../admin/product"
                                   class="{{ (request()->segment(2) == 'product') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Product
                                </a>
                            </li>
                            <li>
                                <a href="../admin/category"
                                   class="{{ (request()->segment(2) == 'category') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Category
                                </a>
                            </li>
                            <li>
                                <a href="../admin/feedback"
                                   class="{{ (request()->segment(2) == 'feedback') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon"></i>Feedback
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->level != \App\Utilities\Constant::user_level_staff)
                                <li>
                                    <a href="../admin/restaurant"
                                       class="{{ (request()->segment(2) == 'restaurant') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>Restaurant
                                    </a>
                                </li>
                                <li>
                                    <a href="../admin/user"
                                       class="{{ (request()->segment(2) == 'user') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon"></i>User
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </ul>
                </div>
            </div>
        </div>

        <div class="app-main__outer" style="padding-left: 250px">


            <!--  MAIN HERE -->

        @yield('body')

        <!--  end MAIN HERE -->

        </div>
    </div>

</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>

<script src="../dashboard/assets/scripts/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../dashboard/assets/scripts/main.js"></script>
<script type="text/javascript" src="../dashboard/assets/scripts/my_script.js"></script>
</body>

</html>
