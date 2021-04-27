@extends('front.layout.master')

@section('title', 'Check Out')

@section('body')

    <section class="section bg-light">
        <div class="container">
            <div class="row">
                @if($notification != null)
                    <div class="col-lg-8 offset-lg-4">
                        <span class="icon icon-xl icon-success"><i class="ti ti-check-box"></i></span>
                        <h1 class="mb-2">Thank you for your order!</h1>
                        <h4 class="text-muted mb-5">{{ $notification }}</h4>
                        <a href="{{ asset('') }}menu" class="btn btn-outline-secondary">
                            <span>Go back to menu</span>
                        </a>
                    </div>
                @endif

                @if($error != null)
                    <div class="col-lg-8 offset-lg-4">
                        <span class="icon icon-xl icon-danger"><i class="ti ti-close"></i></span>
                        <h1 class="mb-2">Error. Please try again later</h1>
                        <h4 class="text-muted mb-5">{{ $error }}</h4>
                        <a href="{{ asset('') }}menu" class="btn btn-outline-secondary">
                            <span>Go back to menu</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
