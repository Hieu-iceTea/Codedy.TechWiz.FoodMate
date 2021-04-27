@extends('admin.layout.master')

@section('title', 'Report')

@section('body')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                    </div>
                    <div>Report table
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-actions-pane-right mb-3">
            <div role="group" class="btn-group-sm btn-group">
                <a name="view" class="{{ request('view') == 'all' ? 'active' : '' }} btn btn-focus" href="admin/report?view=all">All Time</a>
                <a name="view" class="{{ request('view') == 'this_month' ? 'active' : '' }} btn btn-success" href="admin/report?view=last_month">This Month</a>
                <a name="view" class="{{ request('view') == 'last_month' ? 'active' : '' }} btn btn-primary" href="admin/report?view=last_month">Last Month</a>
                <a name="view" class="{{ request('view') == 'this_year' ? 'active' : '' }} btn btn-gradient-primary" href="admin/report?view=last_month">This Year</a>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-header"><i class="header-icon lnr-store mr-3 text-muted opacity-6"> </i>
                    Top 10 Restaurant Selling
                </div>
                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Revenue</th>
                    </tr>
                    </thead>
                    <tbody {{$i = 1}}>
                    @foreach($restaurants as $r)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$r->name}}</td>
                        <td>{{$r->address}}</td>
                        <td>{{$r->total}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>



            <div class="card-body">

                <div class="card-header"><i class="header-icon lnr-store mr-3 text-muted opacity-6"> </i>
                    Top 10 Ordered Item
                </div>
                <table style="width: 100%;" id="" class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Total Order</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tbody {{$i = 1}}>
                    @foreach($products as $p)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->country}}</td>
                            <td>{{$p->total}}</td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
