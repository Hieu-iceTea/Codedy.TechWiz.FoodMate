@extends('front.layout.master')

@section('title', 'Offer')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Restaurans</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">
        <div class="container">
            @foreach($restaurants as $restaurant)
            <!-- Special Offer -->
            <div class="special-offer mb-5 animated" data-animation="fadeIn">
                <img src="../front/data-images/restaurants/{{$restaurant->image}}" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">{{$restaurant->name}}</h2>
                    <h5 class="text-muted mb-5">{{$restaurant->address}}</h5>
                    {!!$restaurant->description!!}
                </div>
            </div>
                @endforeach
        </div>
    </div>

@endsection
