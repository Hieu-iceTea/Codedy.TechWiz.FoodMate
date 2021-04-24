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
    public static $user_levels = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'customer',
    ];

    //user_gender
    const user_gender_Male = 1;
    const user_gender_Female = 2;
    public static $user_genders = [
        self::user_gender_Male => 'Male',
        self::user_gender_Female => 'Female',
    ];
  
    //product_tag
    const product_tag_Breakfast = 1;
    const product_tag_Lunch = 2;
    const product_tag_Dinner = 3;
    const product_tag_Snacks = 4;
    public static $product_tags = [
        self::product_tag_Breakfast => 'Breakfast',
        self::product_tag_Lunch => 'Lunch',
        self::product_tag_Dinner => 'Dinner',
        self::product_tag_Snacks => 'Snacks',
    ];

    //product_pay_type
    const product_pay_type_Cash = 1;
    const product_pay_type_VnPay = 2;
    const product_pay_type_CreditCard = 3;
    public static $product_pay_types = [
        self::product_pay_type_Cash => 'Cash',
        self::product_pay_type_VnPay => 'VnPay',
        self::product_pay_type_CreditCard => 'Credit Card',
    ];
}
