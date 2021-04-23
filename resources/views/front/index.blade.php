@extends('front.layout.master')

@section('title', 'Home')

@section('body')


    <!-- Section - Main -->
    <section class="section section-main section-main-1 bg-light">

        <div class="container dark">
            <div class="slide-container">
                <div id="section-main-1-carousel-image" class="image inner-controls">
                    <div class="slide">
                        <div class="bg-image"><img src="data-images/photos/slider-pasta.jpg"
                                                   alt=""></div>
                    </div>
                    <div class="slide">
                        <div class="bg-image"><img src="data-images/photos/slider-burger.jpg"
                                                   alt=""></div>
                    </div>
                    <div class="slide">
                        <div class="bg-image"><img src="data-images/photos/slider-dessert.jpg"
                                                   alt=""></div>
                    </div>
                </div>
                <div class="content dark">
                    <div id="section-main-1-carousel-content">
                        <div class="content-inner">
                            <h4 class="text-muted">New product!</h4>
                            <h1>Boscaiola Pasta</h1>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary btn-lg" data-action="open-cart-modal"
                                        data-id="1"><span>Add to cart</span></button>
                                <span class="price price-lg">from $9.98</span>
                            </div>
                        </div>
                        <div class="content-inner">
                            <h1>Get 10% off coupon</h1>
                            <h5 class="text-muted mb-5">and use it with your next order!</h5>
                            <a href="page-offers.html"
                               class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
                        </div>
                        <div class="content-inner">
                            <h1>Delicious Desserts</h1>
                            <h5 class="text-muted mb-5">Order it online even now!</h5>
                            <a href="menu-list-collapse.html"
                               class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                        </div>
                    </div>
                    <nav class="content-nav">
                        <a class="prev" href="#"><i class="ti ti-arrow-left"></i></a>
                        <a class="next" href="#"><i class="ti ti-arrow-right"></i></a>
                    </nav>
                </div>
            </div>
        </div>

    </section>

    <!-- Section - About -->
    <section class="section section-bg-edge">

        <div class="image right col-md-6 offset-md-6">
            <div class="bg-image"><img src="data-images/photos/bg-food.jpg" alt=""></div>
        </div>

        <div class="container">
            <div class="col-lg-5 col-md-9">
                <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i>
                </div>
                <h1>The best food in London!</h1>
                <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper
                    condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
                <div class="blockquotes">
                    <!-- Blockquote -->
                    <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                        <div class="blockquote-content">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>It’ was amazing feeling for my belly!</p>
                        </div>
                        <footer>
                            <img src="data-images/avatars/avatar02.jpg" alt="">
                            <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                        </footer>
                    </blockquote>
                    <!-- Blockquote -->
                    <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                        <div class="blockquote-content dark">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>Great food and great atmosphere!</p>
                        </div>
                        <footer>
                            <img src="data-images/avatars/avatar01.jpg" alt="">
                            <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>

    </section>

    <!-- Section - Steps -->
    <section class="section section-extended right dark">

        <div class="container bg-dark">
            <div class="row">
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2"><a href="menu-list-collapse.html">Pick a dish</a></h4>
                            <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper
                                condimentum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Make a payment</h4>
                            <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper
                                condimentum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Recieve your food!</h4>
                            <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper
                                condimentum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Section - Menu -->
    <section class="section pb-0 protrude">

        <div class="container">
            <h1 class="mb-6">Our menu</h1>
        </div>

        <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                "dots": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 1
                        }
                    },
                    {
                        "breakpoint": 690,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }'>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Burgers">
                    <img src="data-images/photos/menu-sample-burgers.jpg" alt="" class="image">
                    <h3 class="title">Burgers</h3>
                </a>
            </div>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Pizza">
                    <img src="data-images/photos/menu-sample-pizza.jpg" alt="" class="image">
                    <h3 class="title">Pizza</h3>
                </a>
            </div>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Sushi">
                    <img src="data-images/photos/menu-sample-sushi.jpg" alt="" class="image">
                    <h3 class="title">Sushi</h3>
                </a>
            </div>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Pasta">
                    <img src="data-images/photos/menu-sample-pasta.jpg" alt="" class="image">
                    <h3 class="title">Pasta</h3>
                </a>
            </div>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Desserts">
                    <img src="data-images/photos/menu-sample-dessert.jpg" alt="" class="image">
                    <h3 class="title">Desserts</h3>
                </a>
            </div>
            <!-- Menu Sample -->
            <div class="menu-sample">
                <a href="menu-list-navigation.html#Drinks">
                    <img src="data-images/photos/menu-sample-drinks.jpg" alt="" class="image">
                    <h3 class="title">Drinks</h3>
                </a>
            </div>
        </div>

    </section>

    <!-- Section - Offers -->
    <section class="section bg-light">

        <div class="container">
            <h1 class="text-center mb-6">Special offers</h1>
            <div class="carousel" data-slick='{"dots": true}'>
                <!-- Special Offer -->
                <div class="special-offer">
                    <img src="data-images/photos/special-burger.jpg" alt=""
                         class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2">Free Burger</h2>
                        <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                        <ul class="list-check text-lg mb-0">
                            <li>Only on Tuesdays</li>
                            <li class="false">Order higher that $40</li>
                            <li>Unless one burger ordered</li>
                        </ul>
                    </div>
                </div>
                <!-- Special Offer -->
                <div class="special-offer">
                    <img src="data-images/photos/special-pizza.jpg" alt=""
                         class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2">Free Small Pizza</h2>
                        <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                        <ul class="list-check text-lg mb-0">
                            <li>Only on Weekends</li>
                            <li class="false">Order higher that $40</li>
                        </ul>
                    </div>
                </div>
                <!-- Special Offer -->
                <div class="special-offer">
                    <img src="data-images/photos/special-dish.jpg" alt=""
                         class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2">Chip Friday</h2>
                        <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                        <ul class="list-check text-lg mb-0">
                            <li>Only on Friday</li>
                            <li>All products</li>
                            <li>Online order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Section -->
    <section class="section section-lg dark bg-dark">

        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="data-images/photos/bg-croissant.jpg" alt="">
        </div>

        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="mb-3">Check our promo video!</h2>
                    <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                    <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo"
                            data-video="https://www.youtube.com/embed/uVju5--RqtY"></button>
                </div>
            </div>
        </div>

    </section>


@endsection
