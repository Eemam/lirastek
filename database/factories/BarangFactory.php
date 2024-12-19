<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name() ,
            'kategori' => fake()->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Lainnya']) ,
            'jumlah' => fake()->numberBetween(1,50) * 100 ,
            'harga' => fake()->numberBetween(1,500) * 10000 ,
            'tanggal_masuk' => now(),
        ];
    }
}
