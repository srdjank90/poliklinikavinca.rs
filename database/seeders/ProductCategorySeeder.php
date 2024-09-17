<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productCategories = [
            [
                'name' => 'Uncategorized',
                'slug' => 'uncategorized',
                'description' => 'Default category for products',
                'user_id' => 1
            ],

        ];
        ProductCategory::insert($productCategories);
    }
}
