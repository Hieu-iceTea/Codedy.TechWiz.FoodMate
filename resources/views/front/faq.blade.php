@extends('front.layout.master')

@section('title', 'FAQ')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="bg-image bg-parallax"><img src="../../assets.suelo.pl/soup/img/photos/bg-desk.jpg" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">FAQ</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Side Navigation -->
                    <nav id="side-navigation" class="stick-to-content pt-4" data-local-scroll>
                        <h5 class="mb-3"><i class="ti ti-align-justify mr-3 text-muted"></i>Pick a content:</h5>
                        <ul class="nav nav-vertical">
                            <li class="nav-item">
                                <a href="#faq1" class="nav-link">General</a>
                                <ul>
                                    <li class="nav-item"><a href="#faq1_1" class="nav-link">How does it work?</a></li>
                                    <li class="nav-item"><a href="#faq1_2" class="nav-link">How long does it take?</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#faq2" class="nav-link">Delivery</a>
                                <ul>
                                    <li class="nav-item"><a href="#faq2_1" class="nav-link">How does it work?</a></li>
                                    <li class="nav-item"><a href="#faq2_2" class="nav-link">How long does it take?</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#faq3" class="nav-link">Payments</a>
                                <ul>
                                    <li class="nav-item"><a href="#faq3_1" class="nav-link">How does it work?</a></li>
                                    <li class="nav-item"><a href="#faq3_2" class="nav-link">How long does it take?</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-8 offset-md-1">
                    <div id="faq1">
                        <h3><i class="ti ti-file mr-4 text-primary"></i>General info</h3>
                        <hr>
                        <div id="faq1_1" class="pb-5">
                            <h4>How does it work?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio,
                                scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel
                                accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero,
                                vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                        <div id="faq1_2" class="pb-5">
                            <h4>How long does it take?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante
                                felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl.
                                Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                    </div>
                    <div id="faq2">
                        <h3><i class="ti ti-package mr-4 text-primary"></i>Delivery</h3>
                        <hr>
                        <div id="faq2_1" class="pb-5">
                            <h4>How does it work?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio,
                                scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel
                                accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero,
                                vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                        <div id="faq2_2" class="pb-5">
                            <h4>How long does it take?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante
                                felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl.
                                Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                    </div>
                    <div id="faq3">
                        <h3><i class="ti ti-wallet mr-4 text-primary"></i>Payments</h3>
                        <hr>
                        <div id="faq3_1" class="pb-5">
                            <h4>How does it work?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p>Sed lacus lacus, tincidunt a posuere sed, varius ut sapien. Vivamus nulla odio,
                                scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante felis, consequat vel
                                accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl. Donec lorem libero,
                                vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                        <div id="faq3_2" class="pb-5">
                            <h4>How long does it take?</h4>
                            <p class="lead">Vivamus non euismod dui. Curabitur rhoncus massa sit amet nisi molestie
                                lobortis. Nam quis neque nec odio vestibulum pulvinar sit amet sed enim.</p>
                            <p> Vivamus nulla odio, scelerisque eu orci ut, tincidunt consequat ligula. Etiam ante
                                felis, consequat vel accumsan vitae, gravida nec mauris. Maecenas vitae lobortis nisl.
                                Donec lorem libero, vulputate sed arcu nec, sollicitudin vestibulum nisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
