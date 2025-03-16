<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersControlller extends Controller
{
    public function index()
    {
        return view('orders',[
            'orders' => Order::all()
        ]);
    }
    public function show(string $id)
    {
        return view('order',
            ['order' => Order::all()->where('id',$id)->first()
        ]);
    }
}
