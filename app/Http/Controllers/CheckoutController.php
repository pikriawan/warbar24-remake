<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $customer = Customer::where('session_id', $request->session()->getId())->first();

        $cart = $customer
            ->orders
            ->where('status', null)
            ->first();

        $cart->customer_name = $request->string('customer_name');
        $cart->status = 'pending';

        $cart->save();

        return redirect('/order/' . $cart->id);
    }
}
