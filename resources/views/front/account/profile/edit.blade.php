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
                    <form action="../account/profile" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="cart-details shadow bg-white mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Profile</h5></div>

                            <div class="bg-white p-4 p-md-5 mb-4">

                                @include('components.errors')
                                @include('components.notifications')

                                <h4 class="border-bottom pb-4">
                                    <i class="ti ti-user mr-3 text-primary"></i>
                                    Your information

                                    <span class="float-right">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <span class="mr-2 mb-1"><i class="ti ti-save"></i></span>
                                            <span>Save</span>
                                        </button>
                                    </span>
                                </h4>
                                <div class="row">
                                    <div class="form-group col-12 text-center">
                                        <img style="height: 200px; cursor: pointer;"
                                             class="thumbnail rounded-circle" data-toggle="tooltip"
                                             title="Click here to upload your avatar" data-placement="bottom"
                                             src="{{ isset($user->image) ? '../front/data-images/user/' . $user->image : '../dashboard/assets/images/add-image-icon.jpg' }}"
                                             alt="Avatar">
                                        <input name="image" type="file" accept="image/x-png,image/gif,image/jpeg"
                                               onchange="changeImg(this)"
                                               class="image form-control-file" style="display: none;">
                                        <input type="hidden" name="image_old" value="{{ $user->image }}">
                                        <small class="form-text text-muted mt-2">
                                            Avatar is optional. (Click on the image to change)
                                        </small>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label>First Name:</label>
                                        <input class="form-control" name="first_name" required
                                               value="{{ old('first_name') ?? $user->first_name }}"
                                               required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Last Name:</label>
                                        <input class="form-control" name="last_name" required
                                               value="{{ old('last_name') ?? $user->last_name }}"
                                               required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone number:</label>
                                        <input class="form-control" name="phone" required
                                               value="{{ old('phone') ?? $user->phone }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>E-mail address:</label>
                                        <input class="form-control" name="email" required
                                               value="{{ old('email') ?? $user->email }}" required>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Address:</label>
                                        <textarea class="form-control" name="address" required
                                                  required>{{ old('address') ?? $user->address }}</textarea>
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
