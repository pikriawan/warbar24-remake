<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::where('session_id', $request->session()->getId())->first();
        $cart = $customer
            ->orders
            ->where('status', null)
            ->first();
        $menus = $cart->menus;

        $totalPrice = $menus
            ->map(function ($menu) {
                return $menu->price * $menu->pivot->menu_quantity;
            })
            ->reduce(function (?float $carry, float $subtotal) {
                return $carry + $subtotal;
            });
        
        return view('cart', [
            'menus' => $menus,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $customerId = Customer::where('session_id', $request->session()->getId())
            ->first()
            ->id;

        $menuId = Menu::where('id', $request->string('menu_id'))
            ->first()
            ->id;

        $cartId = Order::where('customer_id', $customerId)
            ->where('status', null)
            ->first()
            ->id;

        $menuOrder = DB::table('menu_order')
            ->where('menu_id', $menuId)
            ->where('order_id', $cartId)
            ->first();

        if (!$menuOrder) {
            DB::table('menu_order')->insert([
                'menu_id' => $menuId,
                'order_id' => $cartId,
                'menu_quantity' => 1,
            ]);
        } else {
            if ($request->string('action') == 'increment') {
                DB::table('menu_order')
                    ->where('id', $menuOrder->id)
                    ->increment('menu_quantity');
            } else {
                if ($menuOrder->menu_quantity === 1) {
                    DB::table('menu_order')
                        ->where('id', $menuOrder->id)
                        ->delete();
                } else {
                    DB::table('menu_order')
                        ->where('id', $menuOrder->id)
                        ->decrement('menu_quantity');
                }
            }
        }

        return back();
    }
}
