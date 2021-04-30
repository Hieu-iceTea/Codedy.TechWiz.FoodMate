<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('front.checkout.index');
    }

    public function addOrder(Request $request)
    {
        $data_order = $request->all();
        $data_order['status'] = Constant::order_status_Unconfirmed;

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
            $user = Auth::user();
            $mail_data = [
                'order_infos' => [
                    'full_name' => $user->last_name . ', ' . $user->first_name,
                    'address' => $data_order['delivery_address'],
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'total' => Cart::total(1, '.', ','),
                ],

                'carts' => Cart::content(),
            ];

            $this->sendEmail($mail_data); //Gọi hàm gửi email đã định nghĩa.

            //03. Xóa giỏ hàng
            //Cart::destroy();

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

    private function sendEmail($mail_data)
    {
        $email_to = $mail_data['order_infos']['email'];

        Mail::send('emails.order-notification.email-index',
            compact('mail_data'),
            function ($message) use ($email_to) {
                $message->from('CODEDY.dev@gmail.com', 'CODEDY.dev - Cloud Kitchen');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');
            });
    }
}
