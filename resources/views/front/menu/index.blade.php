@extends('front.layout.master')

@section('title', 'Menu')

@section('body')


    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Menu</h1>
                    <h4 class="text-muted mb-0">Some information about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <!-- Menu Navigation -->
                    <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                        <ul class="nav nav-menu bg-dark dark">
                            @foreach($categories as $category)
                                <li><a href="#{{ $category->name }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">

                @foreach($categories as $category)
                    <!-- Menu Category -->
                        <div id="{{ $category->name }}" class="menu-category">
                            <div class="menu-category-title">
                                <div class="bg-image"><img
                                        src="../front/data-images/categories/{{ $category->image }}" alt=""></div>
                                <h2 class="title">{{ $category->name }}</h2>
                            </div>

                            <div class="menu-category-content padded">
                                <div class="row gutters-sm">
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-lg-4 col-6">
                                                <!-- Menu Item -->
                                                <div class="menu-item menu-grid-item">
                                                    <a href="../menu/{{ $product->id }}">
                                                        <img class="mb-4"
                                                             src="../front/data-images/products/{{ $product->image }}"
                                                             alt="">
                                                    </a>

                                                    <h6 class="mb-0">
                                                        <a href="../menu/{{ $product->id }}">{{ $product->name }}</a>
                                                    </h6>
                                                    <span class="text-muted text-sm">{{ $product->ingredients }}</span>
                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-sm-6"><span class="text-md mr-4"><span
                                                                    class="text-muted">from</span> $<span
                                                                    data-product-base-price>{{ $product->price }}</span></span>
                                                        </div>
                                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                            <a href="../cart/add/{{ $product->id }}"
                                                               class="btn btn-outline-secondary btn-sm">
                                                                <span>Add to cart</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
