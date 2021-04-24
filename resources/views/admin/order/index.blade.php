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

                <div class="page-title-actions">
                    <a href="{{ url()->current() . '/create' }}"
                       class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{ request('search') }}"
                                       placeholder="Search everything" class="form-control">
                                <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp;
                                            Search
                                        </button>
                                    </span>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Full Name</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Street</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Payment Type</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center text-muted">#{{ $order->id }}</td>
                                    <td>
                                        {{ $order->last_name }}, {{ $order->first_name }}
                                    </td>
                                    <td class="text-center">{{ $order->user->user_name ?? '' }}</td>
                                    <td class="text-center">{{ $order->phone }}</td>
                                    <td class="text-center">{{ $order->street }}</td>
                                    <td class="text-center">{{ $order->city }}</td>
                                    <td class="text-center">{{ \App\Utilities\Constant::$product_pay_types[$order->payment_type] }}</td>
                                    <td class="text-center">{{ $order->total_amount }}$</td>
                                    <td class="text-center">{{ \App\Utilities\Constant::$order_status[$order->status] }}</td>
                                    <td class="text-center">
                                        <a href="{{ url()->current() . '/' . $order->id }}"
                                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                        <a href="{{ url()->current() . '/' . $order->id . '/edit'}}"
                                           data-toggle="tooltip" title="Edit"
                                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                        </a>
                                        <form class="d-inline" action="{{ url()->current() . '/' . $order->id }}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation"
                             class="flex items-center justify-between">
                            <div class="flex justify-between flex-1 sm:hidden">
                                            <span
                                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                                « Previous
                                            </span>

                                <a href="#page=2"
                                   class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next »
                                </a>
                            </div>
                        </nav>
                        {{ $orders -> links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
