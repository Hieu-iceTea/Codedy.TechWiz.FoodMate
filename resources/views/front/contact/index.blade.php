@extends('front.layout.master')

@section('title', 'Contact')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Contact Us</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms -->
    <section class="section">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 col-md-10 mb-5 mb-md-0 mx-auto">
                    <div class="example-box">
                        <div class="example-box-title">Leave feedback for us</div>
                        <div class="example-box-content">
                            <form method="post" class="validate-form">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <div class="form-group">
                                    <label>Your name</label>
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Your e-mail</label>
                                    <input name="email" type="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                              required></textarea>
                                </div>
                                <div class="form-group form-submit">
                                    <button type="submit" class="btn btn-primary btn-block"><span>Send message!</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- Section -->
    <section class="section">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 offset-lg-1 col-md-6 mb-5 mb-md-0">
                    <img src="assets/img/logo-horizontal-dark.svg" alt="" class="mb-5" width="130">
                    <h4 class="mb-0">Soup Restaurant</h4>
                    <span class="text-muted">Green Street 22, New York</span>
                    <hr class="hr-md">
                    <div class="row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6 class="mb-1 text-muted">Phone:</h6>
                            +48 21200 2122 221
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-1 text-muted">E-mail:</h6>
                            <a href="#">hello@example.com</a>
                        </div>
                    </div>
                    <hr class="hr-md">
                    <h6 class="mb-3 text-muted">Follow Us!</h6>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                            class="fa fa-facebook"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i
                            class="fa fa-google"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                            class="fa fa-instagram"></i></a>
                </div>
                <div class="col-lg-5 offset-lg-2 col-md-6">
                    <div class="google-map h-500 shadow" data-lat="50.064651" data-lon="19.944981"></div>
                </div>
            </div>
        </div>

    </section>

@endsection
