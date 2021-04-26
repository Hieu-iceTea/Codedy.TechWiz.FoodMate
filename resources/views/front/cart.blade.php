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
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
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
                        <div class="bg-dark dark p-4"><h5 class="mb-0">You cart</h5></div>
                    </div>

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
                            @if(count(Cart::content()) > 0)
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
                                        <tr>
                                            <td>
                                                <img src="../front/data-images/products/{{ $cart->options->image }}"
                                                     style="height: 80px" alt="">
                                            </td>
                                            <td class="title">
                                        <span class="name">
                                            <a href="#product-modal-hide" data-toggle="modal">{{ $cart->name }}</a>
                                        </span>
                                            </td>
                                            <td class="price">${{ $cart->price }}</td>
                                            <td class="price" style="width: 110px">
                                                <form action="../cart/update/{{ $cart->rowId }}">
                                                    <input class="form-control border-light" style="font-weight: bold"
                                                           type="number" name="qty" value="{{ $cart->qty }}"
                                                           onchange="this.form.submit();">
                                                </form>

                                            </td>
                                            <td class="price">${{ $cart->price * $cart->qty }}</td>
                                            <td class="actions">
                                                <a href="../cart/delete/{{ $cart->rowId }}" class="action-icon"><i
                                                        class="ti ti-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <div class="cart-empty">
                                    <i class="ti ti-shopping-cart"></i>
                                    <p>Your cart is empty...</p>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    @if(count(Cart::content()) == 0)
                        <div class="cart-details shadow bg-white mb-4">
                            <div class="cart-empty">
                                <i class="ti ti-shopping-cart"></i>
                                <p>Your cart is empty...</p>
                            </div>
                        </div>
                    @endif

                    @if(count(Cart::content()) > 0)
                        <div class="cart-details shadow bg-white mb-4">
                            <div class="cart-summary">
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
