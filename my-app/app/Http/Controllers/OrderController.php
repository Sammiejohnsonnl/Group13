<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending()
    {
        $pendingOrders = Order::where('status', 'pending')->get();
        return view('products.pending', compact('pendingOrders'));
    }

    public function process(Request $request, Order $order)
    {
        $order->status = 'processed';
        $order->save();

        return redirect()->route('orders.pending')->with('success', 'Order processed successfully.');
    }
}
