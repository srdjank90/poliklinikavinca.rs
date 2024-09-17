<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Developer',
                'description' => 'Developers life SK!'
            ],
            [
                'name' => 'Admin',
                'description' => 'Administrator has all access'
            ],
            [
                'name' => 'Editor',
                'description' => 'Moderator of webshop'
            ],
            [
                'name' => ' User',
                'Description' => 'Registered user of webshop'
            ]
        ];
        Role::insert($roles);
    }
}
