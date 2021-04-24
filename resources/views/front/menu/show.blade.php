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
                            <img src="../front/data-images/products/{{$productDetails->image}}" alt="" style="height: 600px;">
                        </div>
                        <div class="product-content">
                            <div class="product-header text-center">
                                <h1 class="product-title">{{$productDetails->name}}</h1>
                                <span class="product-caption text-muted">{{$productDetails->ingredients}}</span>
                            </div>
                            <p class="lead">{{$productDetails->description}}</p>
                            <hr class="hr-primary">
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
            <div class="col-lg-8 offset-lg-2">
                <h2 class="mb-3">Would you like to visit Us?</h2>
                <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                <a href="menu-list-navigation.html" class="btn btn-primary"><span>Order Online</span></a>
                <a href="book-a-table.html" class="btn btn-outline-primary"><span>Book a table</span></a>
            </div>
        </div>

    </section>

@endsection
