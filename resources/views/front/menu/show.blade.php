@extends('front.layout.master')

@section('title', 'Menu')

@section('body')

    <!-- Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!-- Product Single -->
                    <div class="product-single">
                        <div class="product-image">
                            <img src="../../assets.suelo.pl/soup/img/photos/product-single.jpg" alt="">
                        </div>
                        <div class="product-content">
                            <div class="product-header text-center">
                                <h1 class="product-title">Angus Burger</h1>
                                <span class="product-caption text-muted">Beef, cheese, potato, onion, fries</span>
                            </div>
                            <p class="lead">Nam eleifend elementum sapien et bibendum. Nunc ac diam efficitur, ultrices
                                lorem quis, consectetur odio. Nullam vulputate, eros quis accumsan cursus, elit lectus
                                bibendum nulla, sed dapibus ligula tellus at purus. Fusce id eros id mi cursus semper.
                                Quisque efficitur bibendum nunc a consectetur.</p>
                            <hr class="hr-primary">
                            <h5 class="text-center text-muted">Order details</h5>
                            <div class="panel-details-container">
                                <!-- Panel Details / Size -->
                                <div class="panel-details">
                                    <h5 class="panel-details-title">
                                        <label class="custom-control custom-radio">
                                            <input name="radio_title_size" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <a href="#panelDetailsSize" data-toggle="collapse">Size</a>
                                    </h5>
                                    <div id="panelDetailsSize" class="collapse">
                                        <div class="panel-details-content">
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input name="radio_size" type="radio" class="custom-control-input"
                                                           checked>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Small - 100g ($9.99)</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input name="radio_size" type="radio" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span
                                                        class="custom-control-description">Medium - 200g ($14.99)</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input name="radio_size" type="radio" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span
                                                        class="custom-control-description">Large - 350g ($21.99)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel Details / Additions -->
                                <div class="panel-details">
                                    <h5 class="panel-details-title">
                                        <label class="custom-control custom-radio">
                                            <input name="radio_title_additions" type="radio"
                                                   class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <a href="#panelDetailsAdditions" data-toggle="collapse">Additions</a>
                                    </h5>
                                    <div id="panelDetailsAdditions" class="collapse">
                                        <div class="panel-details-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span
                                                                class="custom-control-description">Tomato ($1.29)</span>
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
                                                            <span
                                                                class="custom-control-description">Chicken ($1.29)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span
                                                                class="custom-control-description">Cheese($1.29)</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span
                                                                class="custom-control-description">Bacon ($1.29)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel Details / Other -->
                                <div class="panel-details">
                                    <h5 class="panel-details-title">
                                        <label class="custom-control custom-radio">
                                            <input name="radio_title_other" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                        <a href="#panelDetailsOther" data-toggle="collapse">Other</a>
                                    </h5>
                                    <div id="panelDetailsOther" class="collapse">
                                        <textarea cols="30" rows="4" class="form-control"
                                                  placeholder="Put this any other informations..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                            </div>
                            <h5 class="text-center text-muted">Order now!</h5>
                            <div class="product-price text-center">$28.98</div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group text-center">
                                        <input type="number" class="form-control input-qty form-control-lg" value="1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-outline-primary btn-lg btn-block"><span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="menu-list-collapse.html" class="btn btn-link">Back to menu</a>
                            </div>
                        </div>
                        <h3 class="mt-5 mb-5 text-center">Reviews</h3>
                        <!-- Blockquote -->
                        <blockquote class="blockquote blockquote-lganimated" data-animation="fadeIn">
                            <div class="blockquote-content dark">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                        class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
                                <p>The best paste I have ever ate in my entire life!</p>
                            </div>
                            <footer>
                                <img src="../../assets.suelo.pl/soup/img/avatars/avatar03.jpg" alt="">
                                <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                            </footer>
                        </blockquote>
                        <!-- Blockquote -->
                        <blockquote class="blockquote blockquote-lganimated" data-animation="fadeIn">
                            <div class="blockquote-content dark">
                                <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                        class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                <p>Great food and great atmosphere!</p>
                            </div>
                            <footer>
                                <img src="../../assets.suelo.pl/soup/img/avatars/avatar04.jpg" alt="">
                                <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="section section-lg dark bg-dark">

        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="../../assets.suelo.pl/soup/img/photos/bg-croissant.jpg" alt="">
        </div>

        <div class="container text-center">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="mb-3">Would you like to visit Us?</h2>
                <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                <a href="menu-list-navigation.html" class="btn btn-primary"><span>Order Online</span></a>
                <a href="book-a-table.html" class="btn btn-outline-primary"><span>Book a table</span></a>
            </div>
        </div>

    </section>

@endsection
