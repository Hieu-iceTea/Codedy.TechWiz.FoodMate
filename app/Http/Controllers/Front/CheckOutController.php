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
        $data_order = $request->all();
        $data_order['status'] = Constant::order_status_ReceiveOrders;

        //Nếu chọn hình thức thanh toán: Tiền mặt (Cash):
        if ($request->get('payment_type') == Constant::product_pay_type_Cash) {
            //Chạy vòng lặp duyệt theo từng nhà hàng:
            foreach (Cart::content()->groupBy('options.restaurant_id') as $carts) {
                //01. Thêm Đơn Hàng
                $data_order['restaurant_id'] = $carts[0]->options->restaurant_id;
                $order = Order::create($data_order);

                //02. Thêm chi tiết đơn hàng
                foreach ($carts as $cart) {
                    $data_orderDetail = [
                        'order_id' => $order->id,
                        'product_id' => $cart->id,

                        'qty' => $cart->qty,
                        'amount' => $cart->price,
                        'total_amount' => $cart->qty * $cart->price,
                    ];
                    OrderDetail::create($data_orderDetail);
                }
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
