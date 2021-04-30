@extends('front.layout.master')

@section('title', 'My Order')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="data-images/photos/bg-croissant.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">My order</h1>
                    <h4 class="text-muted mb-0">Some informations about your checkout</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

        <div class="container">
            <div class="row">

                <div class="col-xl-6 col-lg-6">
                    <div class="cart-details shadow bg-white {{ count($order->orderDetails) <= 3 ? 'stick-to-content' : '' }} mb-4">
                        <div class="bg-dark dark p-4"><h5 class="mb-0">Products list</h5></div>

                        <div class="table-responsive">
                            <table class="cart-table-show table-hover">

                                @foreach($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td>
                                            <img src="../front/data-images/products/{{ $orderDetail->product->image }}"
                                                 style="max-height: 80px; min-width: 90px" alt="product-image">
                                        </td>
                                        <td class="title">
                                        <span class="name">
                                                {{ $orderDetail->product->name }}
                                        </span>
                                            <span
                                                class="caption text-muted">{{ $orderDetail->qty }} item x ${{ $orderDetail->amount }}</span>
                                        </td>
                                        <td class="price">${{ $orderDetail->total_amount }} </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="cart-summary">
                            <div class="row">
                                <div class="col-7 text-right text-muted">Order total:</div>
                                <div class="col-5"><strong>$<span
                                            class="cart-products-total-show">{{ $order->total_amount }}</span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7 text-right text-muted">Devliery:</div>
                                <div class="col-5"><strong>$<span class="cart-delivery-show">0.00</span></strong>
                                </div>
                            </div>
                            <hr class="hr-sm">
                            <div class="row text-lg">
                                <div class="col-7 text-right text-muted">Total:</div>
                                <div class="col-5"><strong>$<span
                                            class="cart-total-show">{{ $order->total_amount }}</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 order-lg-first container">

                    @include('components.errors')

                    <div class="bg-white p-4">

                        <div class="border-bottom">
                            <div class="row">

                                <div class="col-12 col-md-6 mt-3 mt-md-1">
                                    <div class="h4 mb-3">
                                        <i class="ti ti-user mr-3 text-primary"></i>
                                        Order information
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-md-1 mb-3 text-left text-md-right">
                                    @if($order->status == \App\Utilities\Constant::order_status_Unconfirmed)
                                        <form action="../account/my-order/{{ $order->id }}" method="post"
                                              class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-outline-primary"
                                                    onclick="return confirm('Do you really want to cancel this order?')">
                                                <span>Cancel Order</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4 mb-0">
                            <div class="form-group col-sm-6">
                                <label>First Name:</label>
                                <p class="font-weight-bold">{{ Auth::user()->first_name }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Last Name:</label>
                                <p class="font-weight-bold">{{ Auth::user()->last_name }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Phone number:</label>
                                <p class="font-weight-bold">{{ Auth::user()->phone }}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>E-mail address:</label>
                                <p class="font-weight-bold">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Street and number:</label>
                                <p class="font-weight-bold">{{ $order->delivery_address }}</p>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Status:</label>
                                <p class="font-weight-bold">{{ \App\Utilities\Constant::$order_status[$order->status] }}</p>
                            </div>


                        </div>

                        @if($order->status == \App\Utilities\Constant::order_status_Reject)
                            <h4 class="border-bottom pb-4">
                                <i class="ti ti-close mr-3 text-primary"> </i>
                                Reason reject
                            </h4>
                            <div class="row text-lg">
                                <div class="col-md-12 col-sm-12 form-group">
                                    {{ $order->reason_reject }}
                                </div>
                            </div>
                        @endif

                        <h4 class="border-bottom pb-4 d-none"><i class="ti ti-wallet mr-3 text-primary"></i>Payment
                        </h4>
                        <div class="row text-lg d-none">
                            @foreach(\App\Utilities\Constant::$product_pay_types as $key => $value)
                                <div class="col-md-4 col-sm-6 form-group">
                                    <label class="custom-control custom-radio">
                                        <input disabled type="radio"
                                               name="payment_type" value="{{ $key }}"
                                               {{ $value == \App\Utilities\Constant::$product_pay_types[\App\Utilities\Constant::product_pay_type_Cash] ? 'checked' : '' }}
                                               class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{ $value }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
