@extends('front.layout.master')

@section('title', 'Profile')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="{{ asset('') }}front/data-images/photos/bg-croissant.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Profile</h1>
                    <h4 class="text-muted mb-0">Manage your account information</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div>
                        @csrf
                        <div class="cart-details shadow bg-white mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Profile</h5></div>

                            <div class="bg-white p-4 p-md-5 mb-4">

                                <h4 class="border-bottom pb-4">
                                    <i class="ti ti-user mr-3 text-primary"></i>
                                    Your informations

                                    <span class="float-right">
                                        <a href="{{ asset('') }}account/profile/edit" class="btn btn-sm btn-outline-primary">
                                            <span>Edit info</span>
                                        </a>
                                        <a href="{{ asset('') }}account/profile/change-password"
                                           class="btn btn-sm btn-outline-primary">
                                            <span>Change password</span>
                                        </a>
                                        <form action="../account/profile/destroy-account" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-primary"
                                                    onclick="return confirm('Do you really want to delete your account?')">
                                                <span>Delete account</span>
                                            </button>
                                        </form>
                                    </span>
                                </h4>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>First Name:</label>
                                        <p class="font-weight-bold">{{ $user->first_name }}</p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Last Name:</label>
                                        <p class="font-weight-bold">{{ $user->last_name }}</p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone number:</label>
                                        <p class="font-weight-bold">{{ $user->phone }}</p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>E-mail address:</label>
                                        <p class="font-weight-bold">{{ $user->email }}</p>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Address:</label>
                                        <p class="font-weight-bold">{{ $user->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
