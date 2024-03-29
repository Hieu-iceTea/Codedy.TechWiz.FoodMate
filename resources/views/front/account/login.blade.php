@extends('front.layout.master')

@section('title', 'Login')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Login</h1>
                    <h4 class="text-muted mb-0">Please login to your account</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms -->
    <section class="section">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-10 mb-0 mb-md-0 mx-auto">
                    <div class="example-box">
                        <div class="example-box-content">
                            <form method="post">
                                @csrf

                                @include('components.notifications')
                                @include('components.errors')

                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Username or email</label>
                                        <input name="user_name" value="{{ old('user_name') }}" type="text"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control" required>
                                    </div>

                                    <div class="form-group col-6 mt-3">
                                        <label class="custom-control custom-checkbox">
                                            <input name="remember" type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Remember me</span>
                                        </label>
                                    </div>

                                    <div class="form-group col-6 text-right mt-3">
                                        <a href="../account/reset-password">Forgot password?</a>
                                    </div>

                                    <div class="form-group col-12 form-submit mt-3">
                                        <button type="submit" class="btn btn-primary btn-block"><span>Login</span>
                                        </button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4">
                        {{--Do not have an account?--}}
                        New to Cloud-Kitchen?
                        <a href="../account/register" style="text-decoration: underline">
                            <span>Create your account</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
