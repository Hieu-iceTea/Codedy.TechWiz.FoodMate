<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        $credentials = [
            $fieldType => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_customer, //Tài khoản cấp độ khách hàng bình thường.
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended(''); //Mặc định là: trang chủ
        } else {
            return back()->withErrors('ERROR: Email or password is wrong');
        }
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postRegister(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_customer, //đăng ký tài khoản cấp: khách hàng bình thường.
        ];

        User::create($data);

        return redirect('account/login')
            ->with('notification', 'Register Success! Please login.');
    }

    public function myOrderIndex()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id != Auth::id()) {
            return redirect('account/my-order');
        }

        return view('front.account.my-order.show', compact('order'));
    }
}
