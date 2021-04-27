<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <base href="/front/">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Title -->
    <title>@yield('title') | Cloud Kitchen</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">

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

                                                <a href="#" style="text-transform: none" class="font-weight-bold">
                                                    Welcome, {{ Auth::user()->user_name ?? '' }}
                                                </a>

                            @else
                                <a href="#">Account</a>

                            @endif
                                <div class="dropdown-container">
                                    <ul class="dropdown-mega">

                                        @if(Auth::check())
                                            <li>
                                                <div class="mt-2 mb-3">
                                                    <img style="height: 80px;" class="rounded-circle"
                                                         src="../front/data-images/user/{{ Auth::user()->image ?? '_default-user.png' }}"
                                                         alt="">
                                                </div>
                                                <div class="mb-4">
                                                <span style="text-transform: none" class="font-weight-bold">
                                                    Welcome, {{ Auth::user()->user_name ?? '' }}
                                                </span>
                                                </div>
                                            </li>

                                            <li><a href="../account/profile">Profile</a></li>
                                            <li><a href="../account/my-order">My Order</a></li>
                                            <li><a href="../account/logout">Logout</a></li>
                                        @else
                                            <li><a href="../account/login">Login</a></li>
                                            <li><a href="../account/register">Register</a></li>
                                        @endif


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
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">{{ Cart::count() }}</span>
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
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="../">
                <img src="assets/img/logo-cloud-kitchen-black.png" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">0</span>
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
                                <span><a href="../menu" class="title text-primary">Order</a></span>
                            </li>
                            <li>
                                <span><a href="../restaurant" class="title text-primary">Restaurant</a></span>
                            </li>
                            <li>
                                <span><a href="../about" class="title text-primary">Abount</a></span>
                            </li>
                            <li>
                                <span><a href="../feedback" class="title text-primary">Feedback</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-muted">Account Information</h4>
                        <ul class="list-posts">
                            <li><span><a href="../account/login" class="title text-primary">Login</a></span></li>
                            <li><span><a href="../account/register" class="title text-primary">Register</a></span></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">

                        <h4 class="text-muted">Contact Us</h4>
                        <ul class="list-posts">
                            <li>
                                <span class="title text-primary">Could Kitchen</span>
                            </li>
                            <li>
                                <span class="title text-primary">So 8, Ton That Thuyet, My Dinh, Ha Noi</span>
                            </li>
                            <li>
                                <span style="font-variant: lining-nums;"
                                      class="title text-primary"><strong>Phone: </strong>+48 21200 2122 221</span>
                            </li>
                            <li>
                                <span class="title text-primary"><strong>Email: </strong>codedy@gmail.com</span>
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
                @if(count(Cart::content()) > 0)
                    <table class="cart-table-show">
                        @foreach(Cart::content() as $cart)
                            <tr>
                                <td class="title">
                                    <span class="name">
                                        <a href="#product-modal-hide" data-toggle="modal">{{ $cart->name }}</a></span>
                                    <span class="caption text-muted">{{ $cart->qty }} item x ${{ $cart->price  }}</span>
                                </td>
                                <td class="price">${{ $cart->price *  $cart->qty }}</td>
                                <td class="actions">
                                    <button class="close border-0 bg-transparent"
                                            onclick="confirm('Delete this item?') === true ? window.location='../cart/delete/{{ $cart->rowId }}' : ''">
                                        <i class="ti ti-close"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="cart-summary">
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
                @else
                    <div class="cart-empty">
                        <i class="ti ti-shopping-cart"></i>
                        <p>Your cart is empty...</p>
                    </div>
                @endif
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
            <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
            <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>

<!-- Modal / Product -->
<div class="modal fade product-modal" id="product-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="data-images/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti ti-close"></i>
                </button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-1 product-modal-name">Boscaiola Pasta</h6>
                        <span class="text-muted product-modal-ingredients">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$<span class="product-modal-price">9.00</span></div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details panel-details-size">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-sizes-list" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panel-details-sizes-list" class="collapse show">
                        <div class="panel-details-content">
                            <div class="product-modal-sizes">
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input" checked>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Small - 100g ($9.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="radio_size" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Large - 350g ($21.99)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details panel-details-additions">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-additions-content" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panel-details-additions-content" class="collapse">
                        <div class="panel-details-content">
                            <!-- Additions List -->
                            <div class="row product-modal-additions">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details panel-details-form">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panel-details-other" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panel-details-other" class="collapse">
                        <form action="#">
                            <textarea cols="30" rows="4" class="form-control"
                                      placeholder="Put this any other informations..."></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="add-to-cart"><span>Add to Cart</span>
            </button>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-action="update-cart"><span>Update</span>
            </button>
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
                <h3>We are COVID-19 safe!</h3>
                <button class="btn btn-secondary" data-dismiss="modal"><span>Ok, thanks!</span></button>
            </div>
        </div>
    </div>
</div>


<!-- JS Core -->
<script src="dist/js/core.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS Custom -->
<script src="dist/js/custom.js"></script>

</body>


</html>
