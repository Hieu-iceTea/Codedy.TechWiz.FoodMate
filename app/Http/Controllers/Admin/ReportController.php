<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $products = DB::select('select name, image, price, country, count(*) as total
                                    from   products
                                    join order_details od on products.id = od.product_id
                                    join orders o on products.restaurant_id = o.restaurant_id
                                    where month(od.created_at  ) = month(CURRENT_DATE)
                                    and o.status = 2
                                    group by product_id
                                    order by total desc
                                    limit 5');

            $restaurants = DB::select('select name,image,address, sum(total_amount) as total from   restaurants
                                join orders o on restaurants.id = o.restaurant_id
                                where o.status = 2 and  month(o.created_at  ) = month(CURRENT_DATE)
                                group by restaurant_id
                                order by total desc
                                limit 5');
        }
         else if ($request->view == 'last_month') {
            $products = DB::select('select name, image, price, country, count(*) as total
                                    from   products
                                    join order_details od on products.id = od.product_id
                                    join orders o on products.restaurant_id = o.restaurant_id
                                    where month(o.created_at  ) < month(NOW() - 1)
                                    and  o.status = 2
                                    group by product_id
                                    order by total desc
                                    limit 5');

            $restaurants = DB::select('select name,image,address, sum(total_amount) as total from   restaurants
                                join orders o on restaurants.id = o.restaurant_id
                                where o.status = 2 and  month(o.created_at  ) < month(NOW() - 1)
                                group by restaurant_id
                                order by total desc
                                limit 5');
        }
         else if ($request->view == 'this_year') {
             $products = DB::select('select name, image, price, country, count(*) as total
                                    from   products
                                    join order_details od on products.id = od.product_id
                                    join orders o on products.restaurant_id = o.restaurant_id
                                    where YEAR(o.created_at) = YEAR(NOW())
                                    and o.status = 2
                                    group by product_id
                                    order by total desc
                                    limit 5');

             $restaurants = DB::select('select name,image,address, sum(total_amount) as total from   restaurants
                                join orders o on restaurants.id = o.restaurant_id
                                where o.status = 2 and  YEAR(o.created_at) = YEAR(NOW())
                                group by restaurant_id
                                order by total desc
                                limit 5');
         }
         else {
            $restaurants = DB::select('select name,image,address, sum(total_amount) as total from   restaurants
                                join orders o on restaurants.id = o.restaurant_id
                                where o.status = 2
                                group by restaurant_id
                                order by total desc
                                limit 5');

            $products = DB::select('select name,image, price,country , count(*) as total from   products
                                    join order_details od on products.id = od.product_id
                                     join orders o on products.restaurant_id = o.restaurant_id
                                     where o.status = 2
                                    group by product_id
                                    order by total desc
                                    limit 5');
        }


        return view('admin.report.index', compact('restaurants','products' ));
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
