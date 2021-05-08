@extends('front.layout.master')

@section('title', 'Restaurant')

@section('og_image', asset('') . 'openGraph_image_default.jpg')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Restaurant</h1>
                    <h4 class="text-muted mb-0">Some information about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">
        <div class="container">
            <form action="" method="get" class="">

                <div class="row mb-4">
                    <div class="form-group col-sm-12">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Enter location or name of restaurant..."
                               class="form-control">
                    </div>
                </div>
            </form>
        @foreach($restaurants as $restaurant)
            <!-- Restaurant -->
                <div class="special-offer mb-5 animated" data-animation="fadeIn">
                    <img src="data-images/restaurants/{{$restaurant->image}}" alt="" class="special-offer-image">
                    <div class="special-offer-content">
                        <a href="../restaurant/{{$restaurant->id}}/{{ Str::slug($restaurant->name) }}.html"><h2
                                class="mb-2">{{$restaurant->name}}</h2></a>
                        <h5 class="text-muted mb-5">{{$restaurant->address}}</h5>
                        {!!$restaurant->description!!}
                        <br>
                        <a href="../restaurant/{{$restaurant->id}}/{{ Str::slug($restaurant->name) }}.html"
                           class="btn btn-outline-primary btn-lg mt-5"></i><span>Menu & details</span></a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
