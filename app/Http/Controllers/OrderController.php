<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    /*
     * 订单信息
     */
    public function index(){

        $orders = Order::all();

        return view('order',compact('orders'));
    }
}