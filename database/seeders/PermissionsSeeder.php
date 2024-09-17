<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'USER_READ',
                'description' => 'Read users',
            ],
            [
                'name' => 'USER_CREATE',
                'description' => 'Create users',
            ],
            [
                'name' => 'USER_UPDATE',
                'description' => 'Update users',
            ],
            [
                'name' => 'USER_DELETE',
                'description' => 'Delete users',
            ],
            [
                'name' => 'PAGE_READ',
                'description' => 'Read pages',
            ],
            [
                'name' => 'PAGE_CREATE',
                'description' => 'Create pages',
            ],
            [
                'name' => 'PAGE_UPDATE',
                'description' => 'Update pages',
            ],
            [
                'name' => 'PAGE_DELETE',
                'description' => 'Delete pages',
            ],
            [
                'name' => 'PRODUCT_READ',
                'description' => 'Read products',
            ],
            [
                'name' => 'PRODUCT_CREATE',
                'description' => 'Create products',
            ],
            [
                'name' => 'PRODUCT_UPDATE',
                'description' => 'Update products',
            ],
            [
                'name' => 'PRODUCT_DELETE',
                'description' => 'Delete products',
            ],
            [
                'name' => 'POST_READ',
                'description' => 'Read posts',
            ],
            [
                'name' => 'POST_CREATE',
                'description' => 'Create posts',
            ],
            [
                'name' => 'POST_UPDATE',
                'description' => 'Update posts',
            ],
            [
                'name' => 'POST_DELETE',
                'description' => 'Delete posts',
            ],
        ];
        Permission::insert($permissions);
    }
}
