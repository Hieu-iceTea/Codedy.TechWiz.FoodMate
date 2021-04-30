@extends('front.layout.master')

@section('title', 'Menu')

@section('meta_description', $productDetails->name)
@section('og_image', asset('') . 'front/data-images/products/' . $productDetails->image)

@section('body')

    <!-- Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!-- Product Single -->
                    <div class="product-single">
                        <div class="product-image">
                            <img src="data-images/products/{{$productDetails->image}}" alt="">
                        </div>
                        <div class="product-content">
                            <form action="../cart/add/{{ $productDetails->id }}">
                                <div class="product-header text-center">
                                    <h1 class="product-title">{{$productDetails->name}}</h1>
                                    <span class="product-caption my-3">
                                        Restaurant:
                                        <a href="../restaurant/{{$productDetails->restaurant->id}}">{{$productDetails->restaurant->name}}</a>
                                    </span>
                                    <span class="product-caption h3">{{$productDetails->country}}</span>
                                    <span class="product-caption text-muted">{{$productDetails->ingredients}}</span>
                                </div>
                                <p class="lead">{!! $productDetails->description !!}</p>
                                <hr class="hr-primary">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <h5 class="text-center text-muted">Order now!</h5>
                                <div class="product-price text-center">${{$productDetails->price}}</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group text-center">
                                            <input type="number" name="qty" min=1 value=1
                                                   class="form-control input-qty form-control-lg"
                                                   style="height:calc(4.75rem + 2px)">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-outline-primary btn-lg btn-block"
                                                onclick="addCart({{ $productDetails->id }}, this.form['qty'].value)">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="../menu" class="btn btn-link">
                                        <i class="mr-2 fa fa-chevron-left" style="opacity: 0.7"></i>
                                        Back to menu
                                    </a>
                                </div>
                            </form>
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
                <a href="../menu" class="btn btn-primary"><span>Order Online</span></a>
                <a href="../menu" class="btn btn-outline-primary"><span>Book a table</span></a>
            </div>
        </div>

    </section>

@endsection
