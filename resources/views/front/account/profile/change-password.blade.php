@extends('front.layout.master')

@section('title', 'Profile')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="data-images/photos/bg-croissant.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Profile</h1>
                    <h4 class="text-muted mb-0">Manage your account information </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <form action="../account/profile" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="action" value="change_password">

                        <div class="cart-details shadow bg-white mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Profile</h5></div>

                            <div class="bg-white p-4 p-md-5 mb-4">

                                <h4 class="border-bottom pb-4">
                                    <i class="ti ti-user mr-3 text-primary"></i>
                                    Change the password

                                    <span class="float-right">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <span class="mr-2 mb-1"><i class="ti ti-save"></i></span>
                                            <span>Save</span>
                                        </button>
                                    </span>
                                </h4>

                                @include('components.errors')
                                @include('components.notifications')

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Old password:</label>
                                        <input class="form-control" type="password" name="old_password" required
                                               placeholder="Old password ...">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>New password:</label>
                                        <input class="form-control" type="password" name="password" required
                                               placeholder="New password ...">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>New password confirmation:</label>
                                        <input class="form-control" type="password" name="password_confirmation"
                                               required
                                               placeholder="New password confirmation ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
