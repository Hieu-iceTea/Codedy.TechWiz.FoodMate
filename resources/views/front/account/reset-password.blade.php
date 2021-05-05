@extends('front.layout.master')

@section('title', 'Reset Password')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Reset password</h1>
                    <h4 class="text-muted mb-0">Restore your account</h4>
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


                            <!-- Thông báo: Tính năng chưa có, đang phát triển -->
                            <p class="text-center mb-0 d-none">
                                This function is being developed.
                                <br>
                                If you forget your password, please contact the
                                <a href="tel:+84 868 6633 15" class="disabled-animsition"
                                   style="text-decoration: underline">
                                    administrator</a>
                                to receive a new password. Thanks!
                            </p>
                            <!-- END Thông báo: Tính năng chưa có, đang phát triển -->


                            <!-- Form: Nhập email -->
                            @if(!($form_newPassword ?? false))
                                <form method="post">
                                    @csrf

                                    @include('components.notifications')
                                    @include('components.errors')

                                    <input type="hidden" name="action" value="form_sendMail">

                                    <div class="row {{ session('hide_form') ? 'd-none' : ''}}">

                                        <div class="form-group col-12">
                                            <label>Enter your user account's verified email address and we will send you
                                                a
                                                password reset link.</label>
                                            <input name="email" value="{{ old('email') }}" type="email"
                                                   placeholder="Enter your email address"
                                                   class="form-control" required>
                                        </div>

                                        <div class="form-group col-12 form-submit mt-3">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <span>Send password reset email</span>
                                            </button>
                                        </div>

                                    </div>

                                </form>
                                @endif
                            <!-- END Form: Nhập email -->


                            <!-- Form: Nhập mật khẩu mới -->
                            @if($form_newPassword ?? false)
                                <form method="post">
                                    @csrf

                                    @include('components.notifications')
                                    @include('components.errors')

                                    <input type="hidden" name="code" value="{{ request('code') }}">

                                    <input type="hidden" name="action" value="form_newPassword">

                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label>Your email:</label>
                                            <p class="font-weight-bold">
                                                {{ $user->email }}
                                            </p>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>New password</label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>New password confirmation</label>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                   required>
                                        </div>

                                        <div class="form-group col-12 form-submit mt-3">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <span>Change password</span>
                                            </button>
                                        </div>

                                    </div>

                                </form>
                            @endif
                            <!-- END Form: Nhập mật khẩu mới -->


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
