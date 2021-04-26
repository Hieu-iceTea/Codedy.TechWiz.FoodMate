<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->view == 'this_month'){
            $products = DB::select('select name, image, price, country,od.created_at, count(*) as total
                                    from `codedy.techwiz.foodmate`.products
                                    join order_details od on products.id = od.product_id
                                    where od.created_at < NOW()
                                    group by product_id
                                    order by total desc
                                    limit 10');

            $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from `codedy.techwiz.foodmate`.products
                                        join order_details od on products.id = od.product_id
                                        join restaurants r on products.restaurant_id = r.id
                                        where od.created_at
                                        group by product_id
                                        order by total desc
                                        limit 10');
        }
         else if ($request->view == 'last_month') {
            $products = DB::select('select name, image, price, country,od.created_at, count(*) as total
                                    from `codedy.techwiz.foodmate`.products
                                    join order_details od on products.id = od.product_id
                                    where od.created_at < NOW() - INTERVAL 1 month
                                    group by product_id
                                    order by total desc
                                    limit 10');

            $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from `codedy.techwiz.foodmate`.products
                                        join order_details od on products.id = od.product_id
                                        join restaurants r on products.restaurant_id = r.id
                                        where od.created_at < NOW() - INTERVAL 1 month
                                        group by product_id
                                        order by total desc
                                        limit 10');
        }
         else if ($request->view == 'this_year') {
             $products = DB::select('select name, image, price, country,od.created_at, count(*) as total
                                    from `codedy.techwiz.foodmate`.products
                                    join order_details od on products.id = od.product_id
                                    where YEAR(od.created_at) = YEAR(NOW())
                                    group by product_id
                                    order by total desc
                                    limit 10');

             $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from `codedy.techwiz.foodmate`.products
                                        join order_details od on products.id = od.product_id
                                        join restaurants r on products.restaurant_id = r.id
                                        where YEAR(od.created_at) = YEAR(NOW())
                                        group by product_id
                                        order by total desc
                                        limit 10');
         }
         else {
            $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from `codedy.techwiz.foodmate`.products
                                        join order_details od on products.id = od.product_id
                                        join restaurants r on products.restaurant_id = r.id
                                        group by product_id
                                        order by total desc
                                        limit 10');

            $products = DB::select('select name,image, price,country , count(*) as total from `codedy.techwiz.foodmate`.products
                                    join order_details od on products.id = od.product_id
                                    group by product_id
                                    order by total desc
                                    limit 10');
        }


        $restaurantTMonth = DB::select('select name, image, price, country,od.created_at, count(*) as total
                                        from `codedy.techwiz.foodmate`.products
                                        join order_details od on products.id = od.product_id
                                        where od.created_at < NOW() - INTERVAL 1 month
                                        group by product_id
                                        order by total desc
                                        limit 10');


        $orderMonth = Order::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        );
        $restaurants = Restaurant::all();
        $revenueMonth = $orderMonth->sum('total_amount');
        return view('admin.report.index', compact('orderMonth', 'restaurants', 'revenueMonth', 'products', 'restaurantId', 'restaurantTMonth'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
