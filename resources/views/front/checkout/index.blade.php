@extends('front.layout.master')

@section('title', 'Check Out')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="data-images/photos/bg-croissant.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Checkout</h1>
                    <h4 class="text-muted mb-0">Some informations about your checkout</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

        <div class="container">
            <div class="row">

                @if(count(Cart::content()) > 0)
                    <div class="col-xl-4 col-lg-5">
                        <div class="cart-details shadow bg-white stick-to-content mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Your order</h5></div>
                            <table class="cart-table-show">
                                @foreach(Cart::content() as $cart)
                                    <tr>
                                        <td class="title">
                                        <span class="name">
                                            <a href="../#product-modal" data-toggle="modal">
                                                {{ $cart->name }}
                                            </a>
                                        </span>
                                            <span
                                                class="caption text-muted">{{ $cart->qty }} item x ${{ $cart->price }}</span>
                                        </td>
                                        <td class="price">${{ $cart->price * $cart->qty }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="cart-summary">
                                <div class="row">
                                    <div class="col-7 text-right text-muted">Order total:</div>
                                    <div class="col-5"><strong>$<span
                                                class="cart-products-total-show">{{ Cart::total() }}</span></strong>
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
                                                class="cart-total-show">{{ Cart::total() }}</span></strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 order-lg-first">

                        @if(\Illuminate\Support\Facades\Auth::guest())
                            <div class="bg-white p-4 p-md-5 mb-4">
                                <h4 class="border-bottom pb-4">
                                    <i class="ti ti-user mr-3 text-primary"></i>
                                    Please login to continue...
                                </h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <a href="../account/login" class="btn btn-primary"><span>Login</span></a>
                                            <a href="../account/register" class="btn btn-outline-primary"><span>Register now!</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @include('components.errors')

                            <form method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="total_amount" value="{{ Cart::total() }}">

                                <div class="bg-white p-4 p-md-5 mb-4">

                                    <h4 class="border-bottom pb-4">
                                        <i class="ti ti-user mr-3 text-primary"></i>
                                        Your informations
                                    </h4>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>First Name:</label>
                                            <p class="font-weight-bold">{{ Auth::user()->first_name ?? '' }}</p>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Last Name:</label>
                                            <p class="font-weight-bold">{{ Auth::user()->last_name  ?? ''}}</p>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone number:</label>
                                            <p class="font-weight-bold">{{ Auth::user()->phone  ?? ''}}</p>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>E-mail address:</label>
                                            <p class="font-weight-bold">{{ Auth::user()->email  ?? ''}}</p>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Delivery address:</label>
                                            <textarea class="form-control" name="delivery_address" required></textarea>
                                        </div>
                                    </div>

                                    <h4 class="border-bottom pb-4 mt-5 d-none">
                                        <i class="ti ti-wallet mr-3 text-primary"></i>
                                        Payment
                                    </h4>
                                    <div class="row text-lg d-none">
                                        @foreach(\App\Utilities\Constant::$product_pay_types as $key => $value)
                                            <div class="col-md-4 col-sm-6 form-group">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio"
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
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg"><span>Order now!</span>
                                    </button>
                                </div>
                            </form>
                        @endif

                    </div>
                @else
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="cart-details shadow bg-white mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Checkout</h5></div>

                            <div class="cart-empty">
                                <i class="ti ti-shopping-cart"></i>
                                <p>Your cart is empty...</p>
                            </div>
                        </div>
                        <a href="../menu"
                           class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to menu</span></a>
                    </div>
                @endif

            </div>
        </div>

    </section>

@endsection
