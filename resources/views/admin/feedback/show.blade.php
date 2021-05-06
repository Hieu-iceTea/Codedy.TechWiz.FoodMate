@extends('admin.layout.master')

@section('title', 'Feedback')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-light icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Feedback
                        <div class="page-title-subheading">
                            View list and Details feedback
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $feedback->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $feedback->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Message</label>
                            <div class="col-md-9 col-xl-8" style="font-size: 20px">
                                {!! $feedback->message !!}
                                {{--<p>{!! $feedback->message !!}</p>--}}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Rating</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    @for($i=0; $i<$feedback->rating; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor

                                    @for($i=0; $i<5-$feedback->rating; $i++)
                                        <i class="fa fa-star text-black-50"></i>
                                    @endfor

                                    ({{ $feedback->rating }} star)
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Main -->

@endsection
