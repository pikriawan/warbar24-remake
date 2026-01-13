<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(Request $request): View
    {
        $data = Menu::where('is_available', true);

        if ($request->query('search') !== null) {
            $data = $data->ofSearch($request->query('search'));
        }

        if ($request->query('category') !== null) {
            $data = $data->ofCategory($request->query('category'));
        }

        $data = $data
            ->latest()
            ->get()
            ->groupBy(function ($menu) {
                return $menu->category;
            });

        $categories = Menu::where('is_available', true)
            ->get()
            ->map(function ($menu) {
                return $menu->category;
            })
            ->unique();

        return view('menus', [
            'data' => $data,
            'categories' => $categories,
        ]);
    }
}
