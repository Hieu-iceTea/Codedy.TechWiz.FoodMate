@extends('front.layout.master')

@section('title', 'Service')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <h1 class="mb-0">Services</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section section-double">
        <div class="row no-gutters">
            <div class="content col-xl-4 col-md-5">
                <h2>Weddings</h2>
                <p class="lead text-muted">Praesent scelerisque mi ac bibendum tristique. Cras in magna a quam molestie
                    tincidunt nec vitae diam.</p>
                <a href="page-contact.html" class="btn btn-outline-primary btn-lg"><span>Get a quote</span></a>
            </div>
            <div class="image col-xl-8 col-md-7">
                <div class="bg-image"><img src="data-images/photos/service-weddings.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="section section-double">
        <div class="row no-gutters">
            <div class="content col-xl-4 col-md-5">
                <h2>Engagement Parties</h2>
                <p class="lead text-muted">Praesent scelerisque mi ac bibendum tristique. Cras in magna a quam molestie
                    tincidunt nec vitae diam.</p>
                <a href="page-contact.html" class="btn btn-outline-primary btn-lg"><span>Get a quote</span></a>
            </div>
            <div class="image col-xl-8 col-md-7 order-md-first">
                <div class="bg-image"><img src="data-images/photos/service-engagement.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="section section-double">
        <div class="row no-gutters">
            <div class="content col-xl-4 col-md-5">
                <h2>Birthday Parties</h2>
                <p class="lead text-muted">Praesent scelerisque mi ac bibendum tristique. Cras in magna a quam molestie
                    tincidunt nec vitae diam.</p>
                <a href="page-contact.html" class="btn btn-outline-primary btn-lg"><span>Get a quote</span></a>
            </div>
            <div class="image col-xl-8 col-md-7">
                <div class="bg-image"><img src="data-images/photos/service-birthday.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="section section-lg dark bg-dark">

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
