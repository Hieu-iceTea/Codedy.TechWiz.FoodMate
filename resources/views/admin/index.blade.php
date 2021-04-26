@extends('admin.layout.master')

@section('title', 'Restaurant')

@section('body')
    {{--total--}}
    <div class="pt-3">
        <div class="tabs-animation">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Orders</div>
                                    <div class="widget-subheading">Last month</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{$orderMonth->count()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Restaurent</div>
                                    <div class="widget-subheading">Registered restaurants</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{$restaurants->count()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Items Sold</div>
                                    <div class="widget-subheading">Last month revenue</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{$revenueMonth}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    end total--}}
    <div class="row">
        <div class="col-lg-6 col-xl-6 mb-lg-5">
            <div class="main-card mb-3 card">
                <div class="card-header"><i class="header-icon lnr-dinner mr-3 text-muted opacity-6"> </i>Top Ordered
                    Item
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <a name="view" class="{{ request('view') == 'all' ? 'active' : '' }} btn btn-focus" href="../admin?view=all">All Time</a>
                            <a name="view" class="{{ request('view') == 'last_month' ? 'active' : '' }} btn btn-focus" href="../admin?view=last_month">Last Month</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Revenue</th>
                            <th class="text-center">Orders</th>
                        </tr>
                        </thead>
                        <tbody {{$i = 0}}>
                        @foreach($products as $f)
                            <tr>
                                <td class="text-center text-muted">#{{1+ $i++}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class=""
                                                         src="../front/data-images/products/{{$f->image}}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$f->name}}</div>
                                                <div class="widget-subheading opacity-7">{{$f->country}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-warning">${{$f->price * $f->total}}</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1"
                                            class="btn btn-primary btn-sm">{{$f->total}}</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 mb-lg-5">
            <div class="main-card mb-3 card">
                <div class="card-header"><i class="header-icon lnr-store mr-3 text-muted opacity-6"> </i>
                    Top Ordered Item
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="active btn btn-focus">All Time</button>
                            <button class="btn btn-focus">Last Month</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Revenue</th>
                            <th class="text-center">Orders</th>
                        </tr>
                        </thead>
                        <tbody {{$i = 0}}>
                        @foreach($restaurantId as $f)
                            <tr>
                                <td class="text-center text-muted">#{{1+ $i++}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class=""
                                                         src="../front/data-images/restaurants/{{$f->image}}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$f->name}}</div>
                                                <div class="widget-subheading opacity-7">{{$f->address}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-warning">${{$f->price * $f->total}}</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1"
                                            class="btn btn-primary btn-sm">{{$f->total}}</button>
                                </td>
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
@endsection
