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
            <form action="" method="get" class="">

                <div class="row mb-4">
                    <div class="form-group col-sm-12">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Enter location or name of restaurant..."
                               class="form-control">
                    </div>
                </div>
            </form>
            @foreach($restaurants as $restaurant)
            <!-- Special Offer -->
            <div class="special-offer mb-5 animated" data-animation="fadeIn">
              <img src="../front/data-images/restaurants/{{$restaurant->image}}" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <a href="../restaurant/{{$restaurant->id}}"><h2 class="mb-2">{{$restaurant->name}}</h2></a>
                    <h5 class="text-muted mb-5">{{$restaurant->address}}</h5>
                    {!!$restaurant->description!!}
                    <br>
                    <a href="../menu/?restaurant_id={{$restaurant->id}}" class="btn btn-outline-primary btn-lg mt-5"></i><span>Visit Now</span></a>
                    <a href="../restaurant/{{$restaurant->id}}" class="btn btn-outline-primary btn-lg mt-5"></i><span>Details</span></a>

                </div>
            </div>
                @endforeach
        </div>
    </div>

@endsection
