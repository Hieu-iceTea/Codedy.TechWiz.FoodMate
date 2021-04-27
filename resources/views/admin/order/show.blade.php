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

                        <h3 class="text-center">Products list</h3>
                        <hr>

                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Amount</th>
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
                                                                 src="../front/data-images/products/{{ $order->orderDetail->product->image }}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div
                                                            class="widget-heading">{{ $order->orderDetail->product->name }}</div>
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

                        <h3 class="text-center mt-5">Order info</h3>
                        <hr>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Full Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->user->last_name ?? '' }}, {{ $order->user->first_name ?? '' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Phone</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->user->phone ?? '' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->user->email ?? '' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                Delivery address
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->delivery_address ?? '' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                Total Amount</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->total_amount ?? '' }}$</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                Status</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ \App\Utilities\Constant::$order_status[$order->status] }}</p>
                            </div>
                        </div>

                        @if($order->status == \App\Utilities\Constant::order_status_Reject)
                            <div class="position-relative row form-group">
                                <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                    Reason reject</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $order->reason_reject  }}</p>
                                </div>
                            </div>
                        @endif

                        @if($order->status == \App\Utilities\Constant::order_status_Unconfirmed)
                            <div class="position-relative row form-group text-center">

                                <div class="col-12">
                                    <form method="post" action="{{ url()->current() }}" class="d-inline-block">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status"
                                               value="{{ \App\Utilities\Constant::order_status_Accept }}">
                                        <div class="position-relative row form-group">
                                            <div class="col-md-9 col-xl-8">
                                                <button type="submit" class="btn btn-outline-success">Accept</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-danger d-inline-block ml-3"
                                            data-toggle="modal" data-target="#rejectModal">
                                        Reject
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade modal-appendTo-body" id="rejectModal" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="{{ url()->current() }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Reason reject
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <textarea id="reason_reject" name="reason_reject"
                                                                  class="form-control"
                                                                  placeholder="Enter reason reject ..."></textarea>
                                                        </div>

                                                        <input type="hidden" name="status"
                                                               value="{{ \App\Utilities\Constant::order_status_Reject }}">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
