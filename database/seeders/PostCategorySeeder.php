<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postCategories = [
            [
                'name' => 'Uncategorized',
                'slug' => 'uncategorized',
                'description' => 'Default category for posts',
                'user_id' => 1
            ],
        ];
        PostCategory::insert($postCategories);
    }
}
