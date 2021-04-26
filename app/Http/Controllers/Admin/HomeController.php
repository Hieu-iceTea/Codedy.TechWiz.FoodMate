<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Restaurant;
use App\Utilities\Constant;
use Carbon\Carbon;
use Cassandra\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Callback;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->view == 'last_month') {
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
        } else {
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
        return view('admin.index', compact('orderMonth', 'restaurants', 'revenueMonth', 'products', 'restaurantId', 'restaurantTMonth'));
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        $credentials = [
            $fieldType => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin, Constant::user_level_staff],
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin'); //Mặc định là: trang chủ
        } else {
            return back()->withErrors('ERROR: Email or password is wrong');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }
}
