<?php

namespace Database\Seeders;

use App\Models\ProductField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productFields = [
            [
                'name' => 'svojstva_proizvoda',
                'label' => 'Svojstva proizvoda',
                'description' => '',
                'type' => 'textarea',
                'position' => 'default'
            ],
            [
                'name' => 'deklaracija_proizvoda',
                'label' => 'Deklaracija proizvoda',
                'description' => '',
                'type' => 'textarea',
                'position' => 'default'
            ]

        ];
        ProductField::insert($productFields);
    }
}
