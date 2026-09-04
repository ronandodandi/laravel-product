<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'NamaProduk' => 'Laptop ASUS',
            'Qty' => 10,
        ]);

        Product::create([
            'NamaProduk' => 'Mouse Logitech',
            'Qty' => 25,
        ]);

        Product::create([
            'NamaProduk' => 'Keyboard Mechanical',
            'Qty' => 15,
        ]);//
    }
}
