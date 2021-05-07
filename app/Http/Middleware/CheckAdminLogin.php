<?php

namespace App\Http\Middleware;

use App\Utilities\Constant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin') || $request->is('admin/*')) {
            //Nếu chưa đăng nhập
            if (Auth::guest()) {

                //Nếu chưa đăng nhập mà vào login hoặc logout thì cho qua
                if ($request->is('*/login') || $request->is('*/logout')) {
                    return $next($request);
                }

                if ($request->is('admin')) {
                    return redirect()->guest('admin/login');
                }

                return redirect()->guest('admin/login')->withErrors('Please login to admin account to continue...');

            } else { //Nếu đã đăng nhập

                //Nếu đã đăng nhập mà vẫn vào login thì chuyển hướng
                if ($request->is('*/login')) {
                    return redirect('admin');
                }

                if (Auth::user()->level != Constant::user_level_host && Auth::user()->level != Constant::user_level_admin && Auth::user()->level != Constant::user_level_staff) {
                    Auth::logout();

                    return redirect()->guest('admin/login')->withErrors('This account does not have access to the admin page. Please login to admin account to continue...');
                }
            }

            //CheckAuthorizationAdmin:
            //Nếu tài khoản là Staff thì không được dùng user & restaurant:
            if (Auth::check()) {
                if (\Illuminate\Support\Facades\Auth::user()->level == \App\Utilities\Constant::user_level_staff) {
                    if ($request->is('*/user')) {
                        return redirect('admin/user/' . Auth::id());
                    }

                    if ($request->is('*/restaurant')) {
                        return redirect('admin/restaurant/' . Auth::user()->restaurant_id);
                    }
                }
            }
        }

        return $next($request);
    }
}
