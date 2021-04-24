@extends('front.layout.master')

@section('title', 'Offer')

@section('body')


    <!-- Section -->

    <section class="section section-double border-top">
        <div class="row no-gutters flex-md-row-reverse">
            <div class="content col-xl-4 col-md-5">
                <h2>{{$restaurant->name}}</h2>
                <p class="lead text-muted">{{$restaurant->address}}</p>
                <ul class="list-check text-lg">
                    {!!$restaurant->description!!}
                </ul>
                <a href="../menu/" class="btn btn-outline-primary"><span>Go to Menu</span></a>
                <a href="../restaurant" class="btn btn-link"><span>Back</span></a>
            </div>
            <div class="image col-xl-8 col-md-7">
                <div class="bg-image"><img src="data-images/photos/offer-single.jpg" alt=""></div>
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
