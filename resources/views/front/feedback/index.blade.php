@extends('front.layout.master')

@section('title', 'Feedback')

@section('og_image', asset('') . 'openGraph_image_default.jpg')

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

                            <form method="post">
                                @csrf
                                @include('components.errors')
                                @include('components.notifications')
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <div class="form-group">
                                    <label>Your name:</label>
                                    <input name="name" type="text" class="form-control" required
                                           value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Your e-mail:</label>
                                    <input name="email" type="email" class="form-control" required
                                           value="{{ old('email') }}">
                                </div>

                                <div class="form-group mb-3" data-local-scroll>
                                    <label>Your message:</label>
                                    <textarea name="message" id="message" cols="30" rows="5"
                                              class="form-control" required>{{ old('message') }}</textarea>
                                </div>

                                <div class="personal-rating">
                                    <h6 class="mt-4 mb-3">Your ratings for our website:</h6>
                                    <div class="rate-custom">
                                        <input type="radio" id="star5" name="rating" value="5"/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4"/>
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3"/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2"/>
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1"/>
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block mt-4">
                                        <span>Submit feedback</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message');
        // CKEDITOR.config.height = 100; //pixels wide.
    </script>

    <script>
        /*CKEDITOR.replace('message', {
            filebrowserBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html',
            filebrowserUploadUrl: '../plugins/ckfinder_php_3.5.1.1/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });*/

        // CKEDITOR.replace('message', {
        //     filebrowserBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html',
        //     filebrowserImageBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html?type=Images',
        //     filebrowserFlashBrowseUrl: '../plugins/ckfinder_php_3.5.1.1/ckfinder.html?type=Flash',
        //     filebrowserUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Files',
        //     filebrowserImageUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Images',
        //     filebrowserFlashUploadUrl: '../plugins/ckfinder_php_3.5.1.1/connector?command=QuickUpload&type=Flash'
        // });

        //https://ckeditor.com/docs/ckfinder/ckfinder3/#!/guide/dev_ckeditor
    </script>

@endsection
