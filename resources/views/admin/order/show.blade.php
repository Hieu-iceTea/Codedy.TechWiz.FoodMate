@extends('admin.layout.master')

@section('title', 'Order')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Order
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="{{ url()->current() . '/edit'}}" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                    <span>Edit</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" action="{{ url()->current() . '/' }}">
                    @csrf
                    @method('DELETE')
                    <button class="nav-link btn" type="submit"
                            onclick="return confirm('Do you really want to delete this item?')">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                        <span>Delete</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                First Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->first_name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Last Name</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->last_name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">User Name</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->user->user_name ?? '' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Phone</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->phone }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                Street
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->street }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="country"
                                   class="col-md-3 text-md-right col-form-label">City</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->city }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                Payment Type</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ \App\Utilities\Constant::$product_pay_types[$order->payment_type] }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                Total Amount</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->total_amount }}$</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                Status</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ \App\Utilities\Constant::$order_status[$order->status] }}</p>
                            </div>
                        </div>


                        <h2 class="text-center mt-5">Order Detail</h2>
                        <hr>

                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th >Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Total Amount</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order->orderDetails as $order->orderDetail )
                                    <tr>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px;"
                                                                 data-toggle="tooltip" title="Image"
                                                                 data-placement="bottom"
                                                                 src="../front/data-images/products/{{ $order->orderDetail->product->image }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $order->orderDetail->product->name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $order->orderDetail->qty }}</td>
                                        <td class="text-center">{{ $order->orderDetail->product->price }}$</td>
                                        <td class="text-center">{{ $order->orderDetail->total_amount }}$</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
