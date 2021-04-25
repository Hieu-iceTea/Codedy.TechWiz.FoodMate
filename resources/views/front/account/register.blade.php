<!doctype html>
<html lang="en">

<head>
    <base href="/dashboard/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./main.css" rel="stylesheet">
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
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class=""><span class="text-danger">*</span> Email</label>
                                            <input name="email" id="exampleEmail" placeholder="Email here..."
                                                   type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleName" class="">Name</label>
                                            <input name="user_name" id="exampleName" placeholder="Username here..."
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword" class=""><span class="text-danger">*</span>
                                                Password</label>
                                            <input name="password" id="examplePassword" placeholder="Password here..."
                                                   type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePasswordRep" class=""><span class="text-danger">*</span>
                                                Repeat Password</label>
                                            <input name="password_confirmation" id="examplePasswordRep"
                                                   placeholder="Repeat Password here..." type="password"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex align-items-center">
                                    <h5 class="mb-0">Already have an account?
                                        <a href="../account/login" class="text-primary">
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
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>
