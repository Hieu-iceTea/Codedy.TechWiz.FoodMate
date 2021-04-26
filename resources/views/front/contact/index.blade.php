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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096966609174!2d105.7804978148834!3d21.02880578599832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e54!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1619371464947!5m2!1svi!2s" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

    </section>

@endsection
