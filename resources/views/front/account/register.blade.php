@extends('front.layout.master')

@section('title', 'Register')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Register</h1>
                    {{--<h4 class="text-muted mb-0">Register your new account</h4>--}}
                    <h4 class="text-muted mb-0">
                        It only takes a
                        <span class="text-primary">few seconds</span>
                        to create your account
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms -->
    <section class="section">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 col-md-10 mb-0 mb-md-0 mx-auto">
                    <div class="example-box">
                        <div class="example-box-content">
                            <form method="post" enctype="multipart/form-data">
                                @csrf

                                @include('components.notifications')
                                @include('components.errors')

                                <div class="row">

                                    <div class="form-group col-12 text-center">
                                        <img style="height: 200px; cursor: pointer;"
                                             class="thumbnail rounded-circle" data-toggle="tooltip"
                                             title="Click here to upload your avatar" data-placement="bottom"
                                             src="{{ isset($user->image) ? '../front/data-images/user/' . $user->image : '../dashboard/assets/images/add-image-icon.jpg' }}"
                                             alt="Avatar">
                                        <input name="image" type="file" accept="image/x-png,image/gif,image/jpeg" onchange="changeImg(this)"
                                               class="image form-control-file" style="display: none;">
                                        <small class="form-text text-muted mt-2">
                                            Avatar is optional. (Click on the image to change)
                                        </small>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Username</label>
                                        <input name="user_name" value="{{ old('user_name') }}" type="text"
                                               class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Repeat Password</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>First name</label>
                                        <input name="first_name" value="{{ old('first_name') }}" type="text"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Last name</label>
                                        <input name="last_name" value="{{ old('last_name') }}" type="text"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email</label>
                                        <input name="email" value="{{ old('email') }}" type="email" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Phone</label>
                                        <input name="phone" value="{{ old('phone') }}" type="tel" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                    </div>

                                    <div class="form-group form-submit col-12 mt-3">
                                        <button type="submit" class="btn btn-primary btn-block"><span>Register</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4">
                        Already have an account?
                        <a href="../account/login" style="text-decoration: underline">
                            <span>Login now</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </section>

@endsection
