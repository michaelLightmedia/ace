<?php

class Order extends Eloquent
{
	protected $table = 'orders';
	protected $primaryKey = 'id';
    public $timestamps = false;



    public function saveOrderDetail( $arr )
    {
    	$affectedRows = \DB::table('order_details')->insert($arr);

    	return $affectedRows;
    }


    public static function getCustomers()
    {
    	return User::Join('orders', 'users.id', '=', 'orders.user_id')->select('users.firstname', 'users.lastname', 'users.id')->groupby('users.id')->get();
    }

    public static function getOrderNos()
    {
    	return Order::select('orders.id')->get();
    }

}