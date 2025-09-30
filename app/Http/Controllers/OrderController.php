<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();
        return view('pages.admin.order', compact('orders'));
    }

    public function update($firstSlug, $secondSlug)
    {
        $order = Order::where('order_id', $firstSlug)->firstOrFail();

        $order->status = $secondSlug;
        $order->save();
        return redirect()->route('admin.order')->with('success', 'Order updated');
    }

    public function delete($slug)
    {
        $orders = Order::where('order_id', $slug)->firstOrFail();
        $orders->delete();
        return redirect()->route('admin.order')->with('success', 'Order deleted');
    }
}
