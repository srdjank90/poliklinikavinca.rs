<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippings = [
            [
                'name' => 'Lično preuzimanje',
                'description' => 'Porudžbinu preuzima kupac lično',
                'available' => 1,
                'price' => 0.00,
            ],
        ];
        Shipping::insert($shippings);
    }
}
