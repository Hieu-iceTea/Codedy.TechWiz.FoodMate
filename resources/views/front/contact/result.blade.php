@extends('front.layout.master')

@section('title', 'Contact')

@section('body')

    <section class="section bg-light">
        <div class="container">
            <div class="row">
                @if($notification != null)
                    <div class="col-lg-8 offset-lg-4">
                        <span class="icon icon-xl icon-success"><i class="ti ti-check-box"></i></span>
                        <h1 class="mb-2">Thank you!</h1>
                        <h4 class="text-muted mb-5">{{ $notification }}</h4>
                        <a href="../" class="btn btn-outline-secondary">
                            <span>Go Home</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
