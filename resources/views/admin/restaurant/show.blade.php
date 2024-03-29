@extends('admin.layout.master')

@section('title', 'Restaurant')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-map-2 icon-gradient bg-amy-crisp"></i>
                    </div>
                    <div>
                        Restaurant
                        <div class="page-title-subheading">
                            @if(\Illuminate\Support\Facades\Auth::user()->level != \App\Utilities\Constant::user_level_staff)
                                View, create, update, delete and manage.
                            @else
                                My restaurant
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

            <li class="nav-item">
                <a href="{{ url()->current() . '/edit'}}" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                    <span>Edit</span>
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->level != \App\Utilities\Constant::user_level_staff)

                <li class="nav-item delete">
                    <form action="{{ url()->current() . '/' }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="nav-link btn" type="submit"
                                onclick="return confirm('Do you really want to delete this item?')">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-trash fa-w-20"></i>
                    </span>
                            <span>Delete</span>
                        </button>
                    </form>
                </li>

            @endif


        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    <img style="height: 200px;" data-toggle="tooltip"
                                         title="Avatar" data-placement="bottom"
                                         src="../front/data-images/restaurants/{{ $restaurant->image }}" alt="Avatar">
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $restaurant->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Address</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $restaurant->address }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                Description
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{!! $restaurant->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
