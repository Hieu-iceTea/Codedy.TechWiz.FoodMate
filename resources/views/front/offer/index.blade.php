@extends('front.layout.master')

@section('title', 'Offer')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Special Offers</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">
        <div class="container">
            <!-- Special Offer -->
            <div class="special-offer mb-5 animated" data-animation="fadeIn">
                <img src="../../assets.suelo.pl/soup/img/photos/special-burger.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Burger</h2>
                    <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Tuesdays</li>
                        <li class="false">Order higher that $40</li>
                        <li>Unless one burger ordered</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer mb-5 animated" data-animation="fadeIn">
                <img src="../../assets.suelo.pl/soup/img/photos/special-pizza.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Small Pizza</h2>
                    <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Weekends</li>
                        <li class="false">Order higher that $40</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer mb-5 animated" data-animation="fadeIn">
                <img src="../../assets.suelo.pl/soup/img/photos/special-dish.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Chip Friday</h2>
                    <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Friday</li>
                        <li>All products</li>
                        <li>Online order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
