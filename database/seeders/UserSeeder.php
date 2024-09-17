<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Srdjan',
                'last_name' => 'Kordic',
                'email' => 'srdjank90@gmail.com',
                'role_id' => 1,
                'password' => bcrypt('Lika1990!')
            ],
            [
                'first_name' => 'Liljana',
                'last_name' => 'Kordic',
                'email' => 'likaciric90@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('Lika1990!')
            ],
            [
                'first_name' => 'Sofija',
                'last_name' => 'Kordic',
                'email' => 'sofija.kordic@gmail.com',
                'role_id' => 4,
                'password' => bcrypt('Lika1990!')
            ],
        ];
        User::insert($users);
    }
}
