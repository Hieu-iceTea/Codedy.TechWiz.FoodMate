@extends('front.layout.master')

@section('title', 'About')

@section('body')

    <!-- Page Title -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">About Us</h1>
                    <h4 class="text-muted mb-0">Some informations about Cloud Kitchen</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section section-bg-edge">

        <div class="image left bottom col-md-7">
            <div class="bg-image"><img src="data-images/photos/bg-chef.jpg" alt=""></div>
        </div>

        <div class="container">
            <div class="col-lg-5 offset-lg-5 col-md-9 offset-md-3">
                <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star-half-full active"></i></div>
                <h2> Enjoy delicious dishes at home</h2>
                <p class="lead">Online Food Delivery web application</p>
                <p>Our web application that will act as an online
                    bridge between customers/end users and restaurant staff. It will
                    enable end users to browse through restaurant menus online and
                    order food online. It will enable staff to add/modify items in online
                    menus, accept orders, and so on.
                    The Web application will also enable users to register themselves,
                    login to the application, look for food items, and place orders. Users
                    can submit their feedback regarding the application using a feedback
                    form.</p>
                <h6>Mark Johnson, Chef</h6>
                <img src="assets/img/svg/sign.svg" alt="" class="mb-5">
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
