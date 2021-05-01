<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Order;
use App\Models\User;
use App\Utilities\Common;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function login()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);

            if (str_contains(url()->previous(), 'register')) {
                session(['url.intended' => str_replace('register', '', url()->previous())]);
            }
        }

        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        $credentials = [
            $fieldType => $request->user_name,
            'password' => $request->password,
            //'level' => Constant::user_level_customer, //Tài khoản cấp độ khách hàng bình thường.
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {

            if (Auth::user()->level != Constant::user_level_customer) {
                return redirect('admin');
            }

            return redirect()->intended(session('url.intended') ?? ''); //Mặc định là: trang chủ
        } else {
            return back()->withErrors('ERROR: Email or password is wrong');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended(''); //Mặc định là: trang chủ
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postRegister(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $data['level'] = Constant::user_level_customer; //đăng ký tài khoản cấp: khách hàng bình thường.
        $data['active'] = true; //TODO: Tính năng kích hoạt tài khoản bằng email chưa có, nên để mặc định khi tạo là active=true.

        //Xử lý file:
        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'front/data-images/user');
        }

        User::create($data);

        return redirect('account/login')
            ->with('notification', 'Register Success! Please check your email. Login now below.');
    }

    public function myOrderIndex()
    {
        $orders = Order::Orderby('id', 'desc')->where('user_id', Auth::id())->simplePaginate();

        $count_total_item  = count(Order::where('user_id', Auth::id())->get()); //vì dùng simplePaginate() nên không lấy được tổng bản ghi (dùng dòng lệnh này chống cháy)

        //dd($orders);
        //$orders->appends('id');

        return view('front.account.my-order.index', compact('orders', 'count_total_item'));
    }

    public function myOrderShow($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id != Auth::id()) {
            return redirect('account/my-order');
        }

        return view('front.account.my-order.show', compact('order'));
    }

    public function myOrderUpdate($id)
    {
        $data['status'] = Constant::order_status_CanceledByCustomer;

        Order::findOrFail($id)->update($data);

        return redirect('../account/my-order');
    }


    public function profileShow()
    {
        $user = User::findOrFail(Auth::id());

        return view('front.account.profile.show', compact('user'));
    }

    public function profileEdit()
    {
        $user = User::findOrFail(Auth::id());

        return view('front.account.profile.edit', compact('user'));
    }

    public function profileChangePassword()
    {
        $user = User::findOrFail(Auth::id());

        return view('front.account.profile.change-password', compact('user'));
    }

    public function profileUpdate(UserRequest $request)
    {
        $data = $request->all();

        //Bỏ trường này khỏi $data
        unset($data['image_old']);

        //Đổi mật khẩu:
        if ($request->get('new_password') != null) {
            if ($request->get('new_password') != $request->get('new_password_confirmation')) {
                return back()->withErrors('ERROR: Confirm password does not match.');
            }

            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return back()->withErrors('ERROR: Old password does not match.');
            }

            if (Hash::check($request->new_password, Auth::user()->password)) {
                return back()->withErrors('ERROR: New passwords must be different for old passwords.');
            }

            $data['password'] = bcrypt($request->new_password);
        }

        //Xử lý file:
        if ($request->hasFile('image')) {
            //Thêm file mới:
            $data['image'] = Common::uploadFile($request->file('image'), 'front/data-images/user/');

            //Xóa file cũ:
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('front/data-images/user/' . $file_name_old);
            }
        }

        User::findOrFail(Auth::id())->update($data);

        return redirect('account/profile');
    }


    public function profileDestroy()
    {
        $data['deleted'] = true;

        User::findOrFail(Auth::id())->update($data);

        Auth::logout();

        return redirect('');
    }
}
