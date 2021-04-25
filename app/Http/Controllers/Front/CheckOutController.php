<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('front.checkout.index');
    }

    public function addOrder(Request $request)
    {
        if ($request->get('payment_type') == Constant::product_pay_type_Cash) {
            //01. Thêm Đơn Hàng
            $data = $request->all();
            $data['status'] = Constant::order_status_ReceiveOrders;
            $order = Order::create($data);

            //02. Thêm chi tiết đơn hàng
            $carts = Cart::content();

            foreach ($carts as $cart) {
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id,

                    'qty' => $cart->qty,
                    'amount' => $cart->price,
                    'total_amount' => $cart->qty * $cart->price,
                ];

                OrderDetail::create($data);
            }

            //Gửi email:
            //$total = Cart::total();
            //$subtotal = Cart::subtotal();
            //$this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi email đã định nghĩa.

            //03. Xóa giỏ hàng
            Cart::destroy();

            //04. Trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'You will recieve it in 30 minutes. Please check your email..');
        } else {
            return back()->withErrors('Payment methods have not been supported.');
        }
    }

    public function result()
    {
        $notification = session('notification');
        $error = session('error');

        if ($notification == null && $error == null) {
            return redirect('');
        }

        return view('front.checkout.result', compact('notification', 'error'));
    }
}
