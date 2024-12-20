<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Barang::factory(50)->create();

        $kategoriList = ['Elektronik' , 'Pakaian', 'Makanan', 'Lainnya'];

        foreach($kategoriList as $kategori):
            Kategori::create([
                'name' => $kategori,
                'slug' => lcfirst($kategori)
            ]);
        endforeach;
    }
}
