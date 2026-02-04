<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menus', [
            'menus' => Menu::orderBy('category')->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'price' => ['required', 'numeric'],
            'category' => ['nullable', 'string'],
            'is_available' => ['required', 'string', 'in:true,false'],
        ]);

        $menu = new Menu();

        $menu->admin_id = Auth::guard('admin')->user()->id;
        $menu->name = $request->string('name');

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('uploads', 'public');
            $menu->image = $fileName;
        }

        $menu->price = $request->float('price');

        if ($request->filled('category')) {
            $menu->category = $request->string('category');
        }

        $menu->is_available = $request->boolean('is_available');

        $menu->save();

        return redirect('/admin/menus');
    }

    public function show(Menu $menu)
    {
        return view('admin.menu', [
            'menu' => $menu,
        ]);
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'price' => ['required', 'numeric'],
            'category' => ['nullable', 'string'],
            'is_available' => ['required', 'string', 'in:true,false'],
        ]);

        $menu->admin_id = Auth::guard('admin')->user()->id;
        $menu->name = $request->string('name');

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('uploads', 'public');
            $menu->image = $fileName;
        } else {
            $menu->image = null;
        }

        $menu->price = $request->float('price');
        $menu->category = $request->string('category');
        $menu->is_available = $request->boolean('is_available');

        $menu->save();

        return redirect('/admin/menus');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('/admin/menus');
    }
}
