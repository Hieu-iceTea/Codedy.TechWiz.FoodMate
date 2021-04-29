@extends('front.layout.master')

@section('title', 'Menu')

@section('body')


    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Menu</h1>

                    @if(request('restaurant_id') != null)
                        <h4 class="text-muted mb-0">
                            For restaurant:
                            <a href="../restaurant">
                                <span style="font-size: 130%">
                                    {{ $restaurant_name }}
                                </span>
                                (change)
                            </a>
                        </h4>
                    @else
                        <h4 class="text-muted mb-0">
                            For all restaurant.
                            <a href="../restaurant">
                                (Select restaurant)
                            </a>
                        </h4>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <form action="" method="get" class="">
                <input type="hidden" name="restaurant_id" value="{{ request('restaurant_id') }}">
                <div class="row text-lg">

                    @foreach(\App\Utilities\Constant::$product_tags as $product_tag)
                        <div class="col-md-3 col-sm-6 form-group">
                            <label class="custom-control custom-radio">
                                <input type="checkbox" class="custom-control-input"
                                       name="tag[]"
                                       value="{{$product_tag}}"
                                       {{  in_array($product_tag, (request("tag") ?? [])) || request("tag") == null ? 'checked' : '' }}
                                       onchange="this.form.submit();">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">{{ $product_tag }}</span>

                            </label>
                        </div>
                    @endforeach

                </div>

                <div class="row mb-4">
                    <div class="form-group col-sm-12">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                               class="form-control">
                    </div>
                </div>
            </form>

            <div class="row no-gutters">
                <div class="col-md-3">
                    <!-- Menu Navigation -->
                    <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                        @if(count($products) > 0)
                            <ul class="nav nav-menu bg-dark dark">
                                @foreach($categories as $category)
                                    <li><a href="#{{ $category->name }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </nav>
                </div>
                <div class="col-md-9">

                    <!-- Menu Category -->
                    @if(count($products) > 0)
                        @foreach($categories as $category)
                            @if(count($products->toQuery()->where('product_category_id', $category->id)->get()) > 0)
                                <div id="{{ $category->name }}" class="menu-category">
                                    <div class="menu-category-title">
                                        <div class="bg-image"><img
                                                src="data-images/categories/{{ $category->image }}" alt="">
                                        </div>
                                        <h2 class="title">{{ $category->name }}</h2>
                                    </div>

                                    <div class="menu-category-content padded">
                                        <div class="row gutters-sm">
                                            @foreach($products->toQuery()->where('product_category_id', $category->id)->get() as $product)
                                                <div class="col-lg-4 col-6">
                                                    <!-- Menu Item -->
                                                    <div class="menu-item menu-grid-item">
                                                        <a href="../menu/{{ $product->id }}">
                                                            <img class="mb-4"
                                                                 src="data-images/products/{{ $product->image }}"
                                                                 alt="">
                                                        </a>

                                                        <h6 class="mb-0">
                                                            <a href="../menu/{{ $product->id }}">
                                                                {{ strlen($product->name) > 25 ? substr($product->name, 0, 25) . ' ...' : $product->name }}
                                                            </a>
                                                        </h6>
                                                        <span class="text-muted text-sm">
                                                            {{ strlen($product->ingredients) > 35 ? substr($product->ingredients, 0, 35) . ' ...' : $product->ingredients }}
                                                        </span>

                                                        <h6 class="pt-1">
                                                            <span class="text-muted text-sm">
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                Restaurant:
                                                            </span>
                                                            <a href="../restaurant/{{ $product->restaurant->id }}">
                                                                <span class="text-sm">
                                                                    {{ strlen($product->restaurant->name) > 20 ? substr($product->restaurant->name, 0, 20) . ' ...' : $product->restaurant->name }}
                                                                </span>
                                                            </a>
                                                        </h6>


                                                        <div class="row align-items-center mt-4">
                                                            <div class="col-sm-6"><span class="text-md mr-4"><span
                                                                        class="text-muted">price</span> $<span
                                                                        data-product-base-price>{{ $product->price }}</span></span>
                                                            </div>
                                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                                <button onclick="addCart({{ $product->id }})"
                                                                        class="btn btn-outline-secondary btn-sm">
                                                                    <span>Add to cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="menu-category">
                            <div class="menu-category-title">
                                <h2 class="title">No data found</h2>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
