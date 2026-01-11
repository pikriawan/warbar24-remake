<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Telur Balado',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/telur-balado.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Sayur Sop',
            'price'        => 5000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/sayur-sop.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Pare',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/tumis-pare.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Steak',
            'price'        => 30000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/steak.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Hamburger',
            'price'        => 40000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/hamburger.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Pasta',
            'price'        => 25000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/pasta.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Green Tea',
            'price'        => 10000,
            'category'     => 'minuman',
            'is_available' => false,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/green-tea.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Chocolate Milk',
            'price'        => 15000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/chocolate-milk.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Coffee',
            'price'        => 5000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/coffee.jpg'))),
        ]);
    }
}
