<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('front') }}/">
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="@yield('meta_description') - Cloud Kitchen @ Codedy - TechWiz 2021 - FPT Aptech">
    <meta name="keywords" content="@yield('meta_description'), CODEDY, Cloud Kitchen, TechWiz, FPT Aptech"/>

    <meta name="language" content="vi">
    <meta name="language" content="en">
    <meta http-equiv="content-language" content="vi">
    <meta http-equiv="content-language" content="en">

    <meta name="copyright" content="CODEDY">
    <meta name="author" content="Hieu iceTea, DinhHieu8896@gmail.com">

    <!-- Title -->
    <title>Cloud Kitchen | @yield('title')</title>

    <meta name="robots" content="noodp,index,follow"/>
    <meta name='revisit-after' content='1 days'/>

    <meta name="geo.region" content="VN-HN"/>
    <meta name="geo.placename" content="Hà Nội"/>
    <meta name="geo.position" content="21.024813;105.853297"/>
    <meta name="ICBM" content="21.024813, 105.853297"/>

    <meta property="og:title" content="@yield('title') | Cloud Kitchen - TechWiz 2021 @ CODEDY"/>
    <meta property="og:type" content="food"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="@yield('og_image')"/>
    <meta name="url" content="{{ asset('') }}">

    <meta name="fb:page_id" content="107928264386009"/>

    <meta name="og:email" content="codedy.dev@gmail.com"/>
    <meta name="og:phone_number" content="+84868663315"/>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../favicon-front.png" type="image/x-icon">
    <!--<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">-->
    <!--<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">-->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">-->
    <!--<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">-->

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&amp;family=Raleway:wght@100;200;400;500&amp;display=swap"
        rel="stylesheet">

    <!-- CSS Core -->
    <link rel="stylesheet" href="dist/css/core.css"/>

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="dist/css/theme-beige.css"/>

    <!-- CSS Custom -->
    <link rel="stylesheet" href="dist/css/custom.css"/>
</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
                        <a href="../">
                            <img src="assets/img/logo-cloud-kitchen.png" alt="" width="120">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left">
                        <ul id="nav-main" class="nav nav-main">
                            <li><a href="../">Home</a></li>
                            <li><a href="../menu">Menu</a></li>
                            <li><a href="../restaurant">Restaurant</a></li>
                            <li><a href="../about">About</a></li>
                            <li><a href="../feedback">Feedback</a></li>
                            <li><a href="../contact">Contact</a></li>
                            <li class="has-dropdown">
                                @if(Auth::check())

                                    <a href="../#" style="text-transform: none" class="font-weight-bold">
                                        Welcome, {{ Auth::user()->user_name ?? '' }}
                                    </a>

                                @else
                                    <a href="../#">Account</a>

                                @endif
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">

                                        @if(Auth::check())
                                            <li>
                                                <div class="mt-2 mb-3">
                                                    <img style="height: 80px;" class="rounded-circle"
                                                         src="data-images/user/{{ Auth::user()->image ?? '_default-user.png' }}"
                                                         alt="image-user">
                                                </div>
                                                <div class="mb-4">
                                                <span style="text-transform: none" class="font-weight-bold">
                                                    Welcome, {{ Auth::user()->user_name ?? '' }}
                                                </span>
                                                </div>
                                            </li>

                                            <li><a href="../account/profile">Profile</a></li>

                                            <li><a href="../account/logout">Logout</a></li>
                                        @else
                                            <li><a href="../account/login">Login</a></li>
                                            <li><a href="../account/register">Register</a></li>
                                        @endif

                                        <li><a href="../account/my-order">Orders History</a></li>

                                    </ul>
                                    <div class="dropdown-image">
                                        <img src="data-images/photos/dropdown-more.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="col-md-2">
                    <a href="../#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span
                                class="notification {{ Cart::count() <= 0 ? 'd-none' : '' }}">{{ Cart::count() }}</span>
                        </span>
                        <span class="cart-value">$<span class="value-show">{{ Cart::total() }}</span></span>
                    </a>
                </div>
            </div>

        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="../#" id="nav-toggle"
               data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="../">
                <img src="assets/img/logo-cloud-kitchen-black.png" alt="">
            </a>
        </div>

        <a href="../#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification {{ Cart::count() <= 0 ? 'd-none' : '' }}">{{ Cart::count() }}</span>
        </a>

    </header>
    <!-- Header / End -->

    <!-- Content -->
    <div id="content">


        <!--  MAIN HERE -->

    @yield('body')

    <!--  end MAIN HERE -->


        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">

            <div class="container">
                <!-- Footer 1st Row -->
                <div class="footer-first-row row">
                    <div class="col-lg-3 text-center">
                        <a href="../"><img src="assets/img/logo-cloud-kitchen.png" alt="" width="88"
                                           class="mt-5 mb-5"></a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-muted">Get Started</h4>
                        <ul class="list-posts">
                            <li>
                                <span><a href="../" class="title text-primary">Home</a></span>
                            </li>
                            <li>
                                <span><a href="../menu" class="title text-primary">Menu</a></span>
                            </li>
                            <li>
                                <span><a href="../restaurant" class="title text-primary">Restaurant</a></span>
                            </li>
                            <li>
                                <span><a href="../about" class="title text-primary">About</a></span>
                            </li>
                            <li>
                                <span><a href="../feedback" class="title text-primary">Feedback</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-muted">Your Account</h4>
                        <ul class="list-posts">
                            <li><span><a href="../account/login" class="title text-primary">Login</a></span></li>
                            <li><span><a href="../account/register" class="title text-primary">Register</a></span></li>
                            <li><span><a href="../account/my-order" class="title text-primary">Order history</a></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">

                        <h4 class="text-muted">Contact Us</h4>
                        <ul class="list-posts">
                            <li>
                                <span class="title text-primary">Could Kitchen</span>
                            </li>
                            <li>
                                <span class="title text-primary">8, Ton That Thuyet, My Dinh, Ha Noi</span>
                            </li>
                            <li>
                                <span style="font-variant: lining-nums;"
                                      class="title text-primary"><strong>Phone: </strong>
                                    <a href="../contact">+84 868 6633 15</a>
                                </span>
                            </li>
                            <li>
                                <span class="title text-primary"><strong>Email: </strong>
                                    <a href="../contact">codedy.dev@gmail.com</a>
                                </span>
                            </li>

                        </ul>

                        <a href="../" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                                class="fa fa-facebook"></i></a>
                        <a href="../" class="icon icon-social icon-circle icon-sm icon-google"><i
                                class="fa fa-google"></i></a>
                        <a href="../" class="icon icon-social icon-circle icon-sm icon-twitter"><i
                                class="fa fa-twitter"></i></a>
                        <a href="../" class="icon icon-social icon-circle icon-sm icon-youtube"><i
                                class="fa fa-youtube"></i></a>
                        <a href="../" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                                class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer 2nd Row -->
                <div class="footer-second-row">
                    <span class="text-muted">Copyright © Codedy TechWiz 2021</span>
                </div>
            </div>

            <!-- Back To Top -->
            <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

        </footer>
        <!-- Footer / End -->

    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    <div id="panel-cart">
        <div class="panel-cart-container">
            <div class="panel-cart-title">
                <h5 class="title">Your Cart</h5>
                <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
            </div>
            <div class="panel-cart-content cart-details">

                <table class="cart-table-show {{ count(Cart::content()) <= 0 ? 'd-none' : '' }}">
                    @foreach(Cart::content() as $cart)
                        <tr data-rowId="{{ $cart->rowId }}">
                            <td class="title">
                                    <span class="name">
                                        <a href="../#product-modal-hide"
                                           data-toggle="modal">{{ $cart->name }}</a></span>
                                <span class="caption text-muted">{{ $cart->qty }} item x ${{ $cart->price  }}</span>
                            </td>
                            <td class="price">${{ $cart->price *  $cart->qty }}</td>
                            <td class="actions">
                                <button class="close border-0 bg-transparent"
                                        onclick="confirm('Delete this item?') === true ? deleteCart('{{ $cart->rowId }}') : ''">
                                    <i class="ti ti-close"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="cart-summary {{ count(Cart::content()) <= 0 ? 'd-none' : '' }}">
                    <div class="row">
                        <div class="col-7 text-right text-muted">Order total:</div>
                        <div class="col-5"><strong>$<span
                                    class="cart-products-total-show">{{ Cart::total() }}</span></strong></div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Devliery:</div>
                        <div class="col-5"><strong>$<span class="cart-delivery-show">0.00</span></strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5"><strong>$<span
                                    class="cart-total-show">{{ Cart::total() }}</span></strong></div>
                    </div>
                </div>


                <div class="cart-empty {{ count(Cart::content()) > 0 ? 'd-none' : '' }}">
                    <i class="ti ti-shopping-cart"></i>
                    <p>Your cart is empty...</p>
                </div>

            </div>
        </div>
        <a href="../cart"
           class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to cart</span></a>
    </div>

    <!-- Panel Mobile -->
    <nav id="panel-mobile">
        <div class="module module-logo bg-dark dark">
            <a href="../">
                <img src="assets/img/logo-cloud-kitchen.png" alt="" width="88">
            </a>
            <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
        </div>
        <nav class="module module-navigation"></nav>
        <div class="module module-social">
            <h6 class="text-sm mb-3">Follow Us!</h6>
            <a href="../#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="../#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="../#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="../#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="../#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                    class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade" id="modalAddCart" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="data-images/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">
                    <i class="ti ti-check"></i>
                    Add an item to cart successfully
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti ti-close"></i>
                </button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-1 product-modal-name">Product name</h6>
                        <span
                            class="text-muted product-modal-ingredients product-modal-qty-price">Qty item x $Price</span>
                    </div>
                    <div class="col-3 text-lg text-right">$<span class="product-modal-price">Price</span></div>
                </div>
            </div>
            <div class="row">
                <button type="button" data-dismiss="modal"
                        class="modal-btn btn btn-secondary btn-lg col-6 pr-3 border-right">
                    <span>Continue pick dish</span>
                </button>
                <a href="../cart" type="button" data-dismiss="modal"
                   class="modal-btn btn btn-secondary btn-lg col-6 border-left">
                    <span>Go to cart</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>

<!-- Modal / COVID -->
<div class="modal fade" id="covid-modal" role="dialog" data-timeout="1000" data-set-cookie="covid-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="data-images/photos/modal-covid.jpg" alt=""></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3>
                    Hi TechWiz.
                    <br>
                    We are COVID-19 safe!
                </h3>
                <p>
                    We are CODEDY-team, from FPT Aptech, Viet Nam. <br>
                    Participate in the TechWiz 2021 contest with the most demanding standards on Covid-19 prevention and
                    safety.
                    Wish the world will soon overcome this disease.
                </p>
                <button class="btn btn-secondary" data-dismiss="modal"><span>Ok, thanks!</span></button>
            </div>
        </div>
    </div>
</div>

<!-- Cookies Bar -->
<div id="cookies-bar" class="body-bar cookies-bar">
    <div class="body-bar-container container">
        <div class="body-bar-text">
            <h4 class="mb-2">Cookies</h4>
            <p>
                This website uses cookies to ensure you get the best experience on our website.
                <a style="text-decoration: underline" href="../contact">Contact now</a>
                or
                <a style="text-decoration: underline" href="../feedback">feedback for us</a>.
            </p>
        </div>
        <div class="body-bar-action">
            <button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
        </div>
    </div>
</div>


<!-- JS Core -->
<script src="dist/js/core.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- JS Custom -->
<script src="dist/js/custom.js"></script>



<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat"
     theme_color="#ddae71">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "107928264386009");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>


</html>
