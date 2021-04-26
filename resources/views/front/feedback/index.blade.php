@extends('front.layout.master')

@section('title', 'Feedback')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Feedback</h1>
                    <h4 class="text-muted mb-0">Please give your feedback</h4>
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

@endsection
