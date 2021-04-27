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
        if (!$request->is('*/admin/*')) {
            //Nếu chưa đăng nhập
            if (Auth::guest()) {
                return redirect()->guest('admin/login');
            } else { //Nếu đã đăng nhập
                if (Auth::user()->level != Constant::user_level_host && Auth::user()->level != Constant::user_level_admin && Auth::user()->level != Constant::user_level_staff) {
                    Auth::logout();

                    return redirect()->guest('admin/login');
                }
            }
        }

        return $next($request);
    }
}
