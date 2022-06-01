<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Auth;;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_role_id' => Auth::user()->id,
            'billing_address' => $request->address,
            'shipping_address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'payment_method' => $request->checkout,
        ]);

        $order_id = $order->id;
        foreach(session('cart') as $id => $details)
        {
            $order_detail = Order_detail::create([
                'order_id' => $order_id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
            ]);
        }

        return redirect('/');
    }
}
