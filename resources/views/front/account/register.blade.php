<!doctype html>
<html lang="en">

<head>
    <base href="{{ asset('') }}/dashboard/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register | Cloud Kitchen</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Cloud Kitchen">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('') }}main.css" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div
                    class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                        <div class="app-logo"></div>
                        <h4>
                            <div>Welcome,</div>
                            <span>It only takes a <span
                                    class="text-success">few seconds</span> to create your account</span>
                        </h4>
                        <div>
                            <form method="post" class="">
                                @csrf

                                @include('components.errors')

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="user_name" class="">
                                                <span class="text-danger">*</span>
                                                User name
                                            </label>
                                            <input required name="user_name" id="user_name" placeholder="Username here..."
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="password" class=""><span class="text-danger">*</span>
                                                Password</label>
                                            <input required name="password" id="password" placeholder="Password here..."
                                                   type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="password_confirmation" class=""><span
                                                    class="text-danger">*</span>
                                                Repeat Password</label>
                                            <input required name="password_confirmation" id="password_confirmation"
                                                   placeholder="Repeat Password here..." type="password"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="first_name" class=""><span class="text-danger">*</span>
                                                First name
                                            </label>
                                            <input required name="first_name" id="first_name" placeholder="First name here..."
                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="last_name" class=""><span class="text-danger">*</span>
                                                Last name
                                            </label>
                                            <input required name="last_name" id="last_name" placeholder="Last name here..."
                                                   type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class=""><span class="text-danger">*</span> Email</label>
                                            <input required name="email" id="exampleEmail" placeholder="Email here..."
                                                   type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="phone" class=""><span class="text-danger">*</span>Phone</label>
                                            <input required name="phone" id="phone" placeholder="Phone here..."
                                                   type="tel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="address" class=""><span class="text-danger">*</span>
                                                Address
                                            </label>
                                            <textarea class="form-control" name="address" id="address"
                                                      placeholder="Address here..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex align-items-center">
                                    <h5 class="mb-0">Already have an account?
                                        <a href="{{ asset('') }}account/login" class="text-primary">
                                            Sign in
                                        </a>
                                    </h5>
                                    <div class="ml-auto">
                                        <button
                                            class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">
                                            Create Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-lg-flex d-xs-none col-lg-5">
                    <div class="slider-light">
                        <div class="slick-slider slick-initialized">
                            <div>
                                <div
                                    class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                                    tabindex="-1">
                                    <div class="slide-img-bg"
                                         style="background-image: url('assets/images/originals/restaurant-1.PNG');"></div>
                                    <div class="slider-content">
                                        <h3>Chestnut Restaurant & Sky Bar</h3>
                                        <p>
                                            Vegan restaurant offering a variety of meals including salads, wraps,
                                            sandwiches, veggie burgers, lentil bowls, and pasta dinner. Serves craft
                                            beers, kombucha on tap, smoothies, and cold-pressed juices. Kitchen stops at
                                            9pm. Reservations accepted, yet not same-day, Saturdays, or holidays
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('') }}front/assets/scripts/main.js"></script>
</body>

</html>
