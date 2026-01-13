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
            'price'        => 4000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/telur-balado.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Gorengan',
            'price'        => 1000,
            'category'     => 'makanan',
            'is_available' => true,
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
            'name'         => 'Nasi',
            'price'        => 5000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/nasi.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Kerupuk',
            'price'        => 2000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Sayur Terong',
            'price'        => 4000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/sayur-terong.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Sayur Tahu Pedas',
            'price'        => 2000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/sayur-tahu-pedas.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Oseng Usus',
            'price'        => 5000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Ati Balado',
            'price'        => 5000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Kacang Panjang',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/tumis-kacang-panjang.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Sayur Sop',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/sayur-sop.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Soto',
            'price'        => 10000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Ayam Goreng',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/ayam-goreng.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Mie Goreng',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/mie-goreng.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Kangkung',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/tumis-kangkung.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Kikil',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Orek Basah',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Orek Kering',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Buncis',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Labu Siam',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Jamur',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/tumis-jamur.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Tauge',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Pakcoy',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Telur Ceplok',
            'price'        => 4000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/telur-ceplok.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Telur Dadar',
            'price'        => 4000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/telur-dadar.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Pindang Goreng',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/pindang-goreng.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Tumis Sawi Putih',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Ayam Balado',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/ayam-balado.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Ayam Kecap',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/ayam-kecap.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Kentang Balado',
            'price'        => 3000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/kentang-balado.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Ayam Opor',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Lele Goreng',
            'price'        => 9000,
            'category'     => 'makanan',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/lele-goreng.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Es Teh',
            'price'        => 3000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/es-teh.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Teh Hangat',
            'price'        => 3000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/teh-hangat.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Es Jeruk',
            'price'        => 5000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/es-jeruk.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Lemon Tea',
            'price'        => 5000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/lemon-tea.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Nutrisari Jeruk Peras',
            'price'        => 4000,
            'category'     => 'minuman',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Air Es',
            'price'        => 2000,
            'category'     => 'minuman',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Kopi Hitam',
            'price'        => 4000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/kopi-hitam.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Susu Putih Hangat',
            'price'        => 4000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/susu-putih-hangat.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Es Susu Putih',
            'price'        => 5000,
            'category'     => 'minuman',
            'is_available' => true,
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Susu Cokelat Hangat',
            'price'        => 4000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/susu-cokelat-hangat.jpg'))),
        ]);

        Menu::create([
            'admin_id'     => $admin->id,
            'name'         => 'Es Susu Cokelat',
            'price'        => 5000,
            'category'     => 'minuman',
            'is_available' => true,
            'image'        => Storage::disk('public')->putFile('uploads', new File(public_path('images/es-susu-cokelat.jpg'))),
        ]);
    }
}
