<?php


namespace App\Utilities;


class Constant
{
    /*
    |--------------------------------------------------------------------------
    | Các hằng số, role dùng chung toàn hệ thống
    |--------------------------------------------------------------------------
    |
    |
    */


    //Order
    const order_status_ReceiveOrders = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Finish = 6;
    const order_status_Cancel = 0;
    public static $order_status = [
        self::order_status_ReceiveOrders => 'Receive Orders',
        self::order_status_Unconfirmed => 'Unconfirmed',
        self::order_status_Confirmed => 'Confirmed',
        self::order_status_Paid => 'Paid',
        self::order_status_Processing => 'Processing',
        self::order_status_Finish => 'Finish',
        self::order_status_Cancel => 'Cancel',
    ];

    //User
    const user_level_host = 1;
    const user_level_admin = 2;
    const user_level_client = 3;
    public static $user_level = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'customer',
    ];
}
