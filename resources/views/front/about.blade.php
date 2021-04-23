@extends('front.layout.master')

@section('title', 'About')

@section('body')

    <!-- Page Title -->
    <div class="page-title border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <h1 class="mb-0">About Us</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
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
                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                <h2>The best food in London!</h2>
                <p class="lead">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper condimentum. Cras
                    sollicitudin varius condimentum. Praesent a dolor sem....</p>
                <p>Nam eleifend elementum sapien et bibendum. Nunc ac diam efficitur, ultrices lorem quis, consectetur
                    odio. Nullam vulputate, eros quis accumsan cursus, elit lectus bibendum nulla, sed dapibus ligula
                    tellus at purus. Fusce id eros id mi cursus semper. Quisque efficitur bibendum nunc a consectetur.
                    Maecenas vitae quam iaculis, scelerisque purus nec, varius purus. Nullam eget varius elit. Donec
                    eget facilisis nunc, non rutrum lorem.</p>
                <h6>Mark Johnson, Chef</h6>
                <img src="assets/img/svg/sign.svg" alt="" class="mb-5">
                <h4>What people say about Us?</h4>
                <a href="page-reviews.html" class="btn btn-outline-primary"><span>Check our reviews</span></a>
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
