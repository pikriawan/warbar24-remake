<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(Request $request): View
    {
        $data = Menu::all()->groupBy(function ($menu) {
            return $menu->category;
        });

        return view('menu', [
            'data' => $data,
        ]);
    }
}
