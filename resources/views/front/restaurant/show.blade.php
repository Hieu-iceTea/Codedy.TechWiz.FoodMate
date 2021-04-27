@extends('front.layout.master')

@section('title', 'Offer')

@section('body')


    <!-- Section -->
    <section class="section section-bg-edge mb-3 mt-2">

    <div class="section section-double border-top page-content bg-light">
        <div class="row no-gutters flex-md-row-reverse">
            <div class="container col-xl-4 col-md-5">
                <h2>{{$restaurant->name}}</h2>
                <p class="lead text-muted">{{$restaurant->address}}</p>
                <ul class="list-check text-lg">
                    {!!$restaurant->description!!}
                </ul>
                <a href="{{ asset('') }}menu/?restaurant_id={{$restaurant->id}}" class="btn btn-primary"><span>Go to Menu</span></a>
                <a href="{{ asset('') }}restaurant" class="btn btn-link"><span>Back</span></a>
            </div>
            <div class="image left bottom col-md-7">
                <div class="bg-image"><img src="{{ asset('') }}front/data-images/restaurants/{{$restaurant->image}}" alt=""></div>
            </div>
        </div>
    </div>
    </section>

@endsection
