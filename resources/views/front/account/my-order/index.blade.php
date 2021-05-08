@extends('front.layout.master')

@section('title', 'My Order')

@section('og_image', asset('') . 'openGraph_image_default.jpg')

@section('body')

    <!-- Page Title -->
    <div class="page-title bg-dark dark">
        <!-- BG Image -->
        <div class="bg-image bg-parallax"><img src="data-images/photos/bg-croissant.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">My Order</h1>
                    <h4 class="text-muted mb-0">Some informations about your order</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Section -->
    <section class="section bg-light">

        <div class="container {{ \Illuminate\Support\Facades\Auth::guest() ? 'd-none' : '' }}">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="cart-details shadow bg-white mb-4">
                        <div class="bg-dark dark p-4">
                            <h5 class="mb-0">
                                <i class="ti ti-time mr-2"></i>
                                List of my orders history
                                ({{ $count_total_item }})
                            </h5>
                        </div>

                        <div class="table-responsive">
                            <table class="cart-table-show table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 160px">Image</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-right">
                                        Action
                                    </th>
                                </tr>

                                @foreach($orders as $order)
                                    <tr>
                                        <td class="title">#{{ $order->id < 10 ? '0' . $order->id : $order->id }}</td>
                                        <td>
                                            <img
                                                src="data-images/products/{{ $order->orderDetails[0]->product->image ?? '' }}"
                                                style="max-height: 80px; min-width: 90px" alt="">
                                        </td>
                                        <td class="title">
                                            <span class="name">
                                                {{ $order->orderDetails[0]->product->name ?? '' }}

                                                @if(count($order->orderDetails) > 1)
                                                    (and {{ count($order->orderDetails) - 1  }} other items)
                                                @endif
                                            </span>
                                        </td>
                                        <input type="text" name="id" value="{{$order->id}}" hidden>
                                        <td class="title">{{ \App\Utilities\Constant::$order_status[$order->status] }}</td>
                                        <td class="price">{{ $order->total_amount ?? '' }}$</td>
                                        <td class="actions">
                                            <a href="../account/my-order/{{ $order->id }}" class="action-icon">
                                                <i class="ti ti-eye"></i>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    <div class="justify-content-center">
                        <span class="d-inline-block ml-1">
                            Showing
                            {{ ($orders->currentPage() * $orders->perPage()) - $orders->perPage() + 1 }}
                            to
                            {{ ($orders->currentPage() * $orders->perPage() - (8 - count($orders))) }}
                            of
                            {{ $count_total_item }}
                            results
                        </span>
                        <span class="d-inline-block float-right">
                            {{$orders -> links()}}
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="container {{ \Illuminate\Support\Facades\Auth::check() ? 'd-none' : '' }}">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="cart-details shadow bg-white mb-4">
                        <div class="bg-dark dark p-4">
                            <h5 class="mb-0">
                                Please
                                <a href="../account/login" style="text-decoration: underline">login</a>
                                to view your order history!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection
