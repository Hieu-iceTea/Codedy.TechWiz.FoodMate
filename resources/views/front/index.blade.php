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
                                <a href="../menu"
                                   class="btn btn-outline-primary btn-lg"><span>Place an Order</span></a>
                            </div>
                        </div>
                        <div class="content-inner">
                            <h1>Get 10% off coupon</h1>
                            <h5 class="text-muted mb-5">and use it with your next order!</h5>
                            <a href="../menu"
                               class="btn btn-outline-primary btn-lg"><span>Get it now!</span></a>
                        </div>
                        <div class="content-inner">
                            <h1>Delicious Desserts</h1>
                            <h5 class="text-muted mb-5">Order it online even now!</h5>
                            <a href="../menu"
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
                <h2>What do people say about us?</h2>
                <p class="lead text-muted mb-5">These are the reviews of the people who have used our services, the
                    customer reviews tell us the quality of our service !</p>
                <div class="blockquotes">
                    <!-- Blockquote -->
                    <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                        <div class="blockquote-content">
                            <div class="rate rate-sm mb-3">
                                @for($i=1;$i<=$feedbacks[0]->rating;$i++)
                                    <i class="fa fa-star active"></i>
                                @endfor
                                @for($j=1;$j<=5-$feedbacks[0]->rating;$j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <p>{{ $feedbacks[0]->message }}</p>
                        </div>

                        <footer>
                            <img
                                src="../front/data-images/user/{{ $feedbacks[0]->user_id != null ? $feedbacks[0]->user->image : '_default-user.png' }}"
                                alt="">
                            <span class="name">{{ $feedbacks[0]->name }}<span class="text-muted"></span></span>
                        </footer>
                    </blockquote>
                    <!-- Blockquote -->
                    <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                        <div class="blockquote-content dark">
                            <div class="rate rate-sm mb-3">
                                @for($i=1;$i<=$feedbacks[1]->rating;$i++)
                                    <i class="fa fa-star active"></i>
                                @endfor
                                @for($j=1;$j<=5-$feedbacks[1]->rating;$j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <p>{{ $feedbacks[1]->message }}</p>
                        </div>
                        <footer>
                            <img src="../front/data-images/user/{{ $feedbacks[1]->user->image ?? '_default-user.png' }}"
                                 alt="">
                            <span class="name">{{ $feedbacks[1]->name }}<span class="text-muted"></span></span>
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
                            <h4 class="mb-2"><a href="../menu">Pick a dish</a></h4>
                            <p class="text-muted mb-0">Please choose a delicious dish that you like from our menu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Make a payment</h4>
                            <p class="text-muted mb-0">Pay for the food you order from our restaurant.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Recieve your food!</h4>
                            <p class="text-muted mb-3">Pay for the food you order from our restaurant.</p>
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
            @if(count($products) > 0)
                @foreach($product_categories as $product_categories)
                    <div class="menu-sample">
                        <a href="../menu#{{ $product_categories->name }}">
                            <img src="../front/data-images/products/{{ $product_categories->products[0]->image }}"
                                 alt="" class="image">
                            <h3 class="title">{{ $product_categories->name }}</h3>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

    </section>

    <!-- Section - Offers -->
    <section class="section bg-light">

        <div class="container">
            <h1 class="text-center mb-6">Our chain of stores</h1>
            <div class="carousel" data-slick='{"dots": true}'>
                <!-- Special Offer -->

                @foreach($restaurants as $restaurant)
                    <a href="../restaurant/{{ $restaurant->id }}">
                        <div class="special-offer">
                            <img src="../front/data-images/restaurants/{{ $restaurant->image }}" alt=""
                                 class="special-offer-image">
                            <div class="special-offer-content">
                                <h2 class="mb-2">{{ $restaurant->name }}</h2>
                                <h5 class="text-muted mb-5">{{ $restaurant->address }}</h5>
                                <h5>{{ $restaurant->description }}</h5>
                            </div>
                        </div>
                    </a>
                @endforeach
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
                    <h2 class="mb-3">Thank you for using our service!</h2>
                </div>
            </div>
        </div>

    </section>


@endsection
