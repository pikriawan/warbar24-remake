<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::where('session_id', $request->session()->getId())->first();
        $orders = $customer
            ->orders
            ->whereNotNull('status');

        return view('orders', [
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        return view('order', [
            'order' => $order,
        ]);
    }

    public function cancel(Request $request, Order $order): RedirectResponse
    {
        $customer = Customer::where('session_id', $request->session()->getId())->first();

        if ($order->customer != $customer) {
            abort(401);
        }

        $order->status = 'canceled';

        $order->save();

        return back();
    }
}
