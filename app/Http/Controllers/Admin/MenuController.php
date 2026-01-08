<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin.menus', [
            'menus' => $menus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $menu->category = $request->string('category');
        $menu->is_available = $request->boolean('is_available');

        $menu->save();

        return redirect('/admin/menus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
