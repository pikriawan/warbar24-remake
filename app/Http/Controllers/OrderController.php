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
        $orders = Order::where('customer_id', $customer->id)
            ->whereNotNull('status')
            ->orderBy('created_at', 'desc')
            ->get();

        $orders = $orders->map(function ($order) {
            $order->totalPrice = $order->menus->reduce(function (?float $carry, $menu) {
                return $carry + $menu->price * $menu->pivot->menu_quantity;
            });

            return $order;
        });

        return view('orders', [
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        $totalPrice = $order->menus->reduce(function (?float $carry, $menu) {
            return $carry + $menu->price * $menu->pivot->menu_quantity;
        });

        return view('order', [
            'order' => $order,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function cancel(Request $request, Order $order): RedirectResponse
    {
        $customer = Customer::where('session_id', $request->session()->getId())->first();

        if ($order->customer != $customer) {
            abort(401);
        }

        if ($order->status !== 'pending') {
            return back();
        }

        $order->status = 'canceled';

        $order->save();

        return back();
    }
}
