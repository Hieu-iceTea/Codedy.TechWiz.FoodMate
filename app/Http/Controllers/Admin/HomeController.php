<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use App\Utilities\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->view == 'this_month') {
            $products = DB::select('select name, image, price, country,od.created_at, count(*) as total
                                from  products
                                         join order_details od on products.id = od.product_id
                                where month(od.created_at  ) = month(CURRENT_DATE)
                                group by product_id
                                order by total desc
                                limit 5');
            $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from  products
                                join order_details od on products.id = od.product_id
                                join restaurants r on products.restaurant_id = r.id
                                where month(od.created_at  ) = month(CURRENT_DATE)
                                group by restaurant_id
                                order by total desc
                                limit 5');

                                        } else {
            $restaurantId = DB::select('select r.name,r.image, price,r.address, count(*) as total from  products
                                join order_details od on products.id = od.product_id
                                join restaurants r on products.restaurant_id = r.id
                                group by restaurant_id
                                order by total desc
                                limit 5');
            $products = DB::select('select name,image, price,country , count(*) as total from  products
                                join order_details od on products.id = od.product_id
                                group by product_id
                                order by total desc
                                limit 5');
                                        }

        $orders = Order::all();
        $restaurants = Restaurant::all();
        $revenueMonth = Order::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->sum('total_amount');
        $users = User::where('level',Constant::user_level_customer);
        return view('admin.index', compact('orders', 'restaurants', 'revenueMonth', 'products', 'restaurantId','users'));
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
            //'level' => [Constant::user_level_host, Constant::user_level_admin, Constant::user_level_staff], //xử lý trong Middleware
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

        return redirect('account/login'); //sau khi đăng xuất thì hiển thị trang đăng nhập của customer
    }
}
