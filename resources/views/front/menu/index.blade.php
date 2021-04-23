@extends('front.layout.master')

@section('title', 'Home')

@section('body')


    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Menu Grid</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
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
                            <li><a href="#Burgers">Burgers</a></li>
                            <li><a href="#Pasta">Pasta</a></li>
                            <li><a href="#Pizza">Pizza</a></li>
                            <li><a href="#Sushi">Sushi</a></li>
                            <li><a href="#Desserts">Desserts</a></li>
                            <li><a href="#Drinks">Drinks</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <!-- Menu Category / Burgers -->
                    <div id="Burgers" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img
                                    src="data-images/photos/menu-title-burgers.jpg" alt=""></div>
                            <h2 class="title">Burgers</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Category / Pasta -->
                    <div id="Pasta" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="data-images/photos/menu-title-pasta.jpg"
                                                       alt=""></div>
                            <h2 class="title">Pasta</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Category / Pizza -->
                    <div id="Pizza" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="data-images/photos/menu-title-pizza.jpg"
                                                       alt=""></div>
                            <h2 class="title">Pizza</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Category / Sushi -->
                    <div id="Sushi" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="data-images/photos/menu-title-sushi.jpg"
                                                       alt=""></div>
                            <h2 class="title">Sushi</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Category / Desserts -->
                    <div id="Desserts" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img
                                    src="data-images/photos/menu-title-desserts.jpg" alt=""></div>
                            <h2 class="title">Desserts</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Category / Drinks -->
                    <div id="Drinks" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="data-images/photos/menu-title-drinks.jpg"
                                                       alt=""></div>
                            <h2 class="title">Drinks</h2>
                        </div>
                        <div class="menu-category-content padded">
                            <div class="row gutters-sm">
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">Beef Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="1">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pizza.jpg" alt="">
                                        <h6 class="mb-0">Broccoli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>9.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="2">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-burger.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken Burger</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>14.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="3">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-pasta.jpg" alt="">
                                        <h6 class="mb-0">Creste di Galli</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="4">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-chicken-wings.jpg"
                                             alt="">
                                        <h6 class="mb-0">Chicken wings</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="5">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4"
                                             src="data-images/products/product-sushi.jpg" alt="">
                                        <h6 class="mb-0">Nigiri-sushi</h6>
                                        <span class="text-muted text-sm">Beef, cheese, potato, onion, fries</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span class="text-muted">from</span> $<span
                                                        data-product-base-price>13.00</span></span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                <button class="btn btn-outline-secondary btn-sm"
                                                        data-action="open-cart-modal" data-id="6">
                                                    <span>Add to cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
