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
                    <h1 class="mb-0">Cart</h1>
                    <h4 class="text-muted mb-0">Some informations about your cart</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">

                    <div class="cart-details shadow bg-white mb-4">
                        <div class="bg-dark dark p-4">
                            <h5 class="mb-0">
                                You cart

                                <span class="float-right {{ count(Cart::content()) <= 0 ?  'd-none' : ''}}">
                                    <button class="action-icon border-0 bg-transparent"
                                            onclick="confirm('Destroy all cart?') === true ? destroyCart() : ''">
                                        <i class="ti ti-close"></i>
                                    </button>
                                </span>
                            </h5>

                        </div>

                    </div>

                    <div class="cart-details-all {{ count(Cart::content()) <= 0 ?  'd-none' : ''}}">
                        @foreach(Cart::content()->groupBy('options.restaurant_id') as $carts)
                            <div class="cart-details shadow bg-white mb-4">
                                <div class="bg-white p-4 border-bottom">
                                    <h5 class="mb-0 text-warning">
                                        <a href="../restaurant/{{ $carts[0]->options->restaurant_id }}">
                                            {{ $carts[0]->options->restaurant_name }}
                                            <i class="ti ti-angle-right" style="font-size: 80%"></i>
                                        </a>

                                        <span class="float-right">
                                        <form action="../cart/destroy">
                                                @foreach(array_column($carts->toArray(), 'rowId') as $rowId)
                                                <input type="hidden" name="rowIds[]"
                                                       value="{{ $rowId }}">
                                            @endforeach
                                                <button class="action-icon border-0 bg-transparent"
                                                        onclick="return confirm('Delete cart Restaurant: {{ $carts[0]->options->restaurant_name }}')">
                                                    <i class="ti ti-close"></i>
                                                </button>
                                            </form>
                                    </span>
                                    </h5>

                                </div>
                                <table class="cart-table-show">
                                    <tr>
                                        <th style="width: 160px">Image</th>
                                        <th>Name</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    @foreach($carts as $cart)
                                        <tr data-rowId="{{ $cart->rowId }}">
                                            <td>
                                                <img src="data-images/products/{{ $cart->options->image }}"
                                                     style="height: 80px" alt="">
                                            </td>
                                            <td class="title">
                                        <span class="name">
                                            <a href="../menu/{{ $cart->id }}" data-toggle="modal">{{ $cart->name }}</a>
                                        </span>
                                            </td>
                                            <td class="price">${{ $cart->price }}</td>
                                            <td class="price" style="width: 110px">
                                                <form action="../cart/update/{{ $cart->rowId }}">
                                                    <input class="form-control border-light" style="font-weight: bold"
                                                           type="number" name="qty" value="{{ $cart->qty }}" min=1
                                                           onchange="this.form.submit();">
                                                </form>

                                            </td>
                                            <td class="price">${{ $cart->price * $cart->qty }}</td>
                                            <td class="actions">
                                                <button class="action-icon"
                                                        onclick="confirm('Delete this item?') === true ? deleteCart('{{ $cart->rowId }}') : ''">
                                                    <i class="ti ti-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endforeach
                    </div>

                    <div class="cart-details shadow bg-white mb-4">
                        <div class="cart-empty {{ count(Cart::content()) > 0 ?  'd-none' : ''}}">
                            <i class="ti ti-shopping-cart"></i>
                            <p>Your cart is empty...</p>
                        </div>
                    </div>

                    <div class="cart-details shadow bg-white mb-4">
                        <div class="cart-summary {{ count(Cart::content()) <= 0 ?  'd-none' : ''}}">
                            <div class="row">
                                <div class="col-8 text-right text-muted">Order total:</div>
                                <div class="col-4"><strong>$<span
                                            class="cart-products-total-show">{{ Cart::total() }}</span></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 text-right text-muted">Devliery:</div>
                                <div class="col-4"><strong>$<span class="cart-delivery-show">0.00</span></strong>
                                </div>
                            </div>
                            <hr class="hr-sm">
                            <div class="row text-lg">
                                <div class="col-8 text-right text-muted">Total:</div>
                                <div class="col-4"><strong>$<span
                                            class="cart-total-show">{{ Cart::total() }}</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count(Cart::content()->groupBy('options.restaurant_id')) > 1)
                        <div class="mb-3 mr-1 text-right cart-note">
                            <span class="text-warning font-weight-bold" style="font-size: 110%">
                               * Note: Your cart is separated into
                                <span style="text-decoration: underline; font-size: 110%">
                                     {{ count(Cart::content()->groupBy('options.restaurant_id')) }} orders
                                </span>
                                because you have selected the product of many different restaurants.
                            </span>
                        </div>
                    @endif

                    @if(count(Cart::content()) > 0)
                        <a href="../checkout" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></a>
                    @else
                        <a href="../menu" class="panel-cart-action btn btn-secondary btn-block btn-lg">
                            <span>Go to menu</span>
                        </a>
                    @endif

                </div>
            </div>
        </div>

    </section>


@endsection
