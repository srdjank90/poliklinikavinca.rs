<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersAddresses = [
            [
                'first_name' => 'Srdjan',
                'last_name' => 'Kordic',
                'address' => 'Kaludjerevo BB',
                'city' => 'Babusnica',
                'zip' => '18330',
                'country' => 'Serbia',
                'phone' => '0655264567',
                'user_id' => 1,
            ],
            [
                'first_name' => 'Srdjan',
                'last_name' => 'Kordic',
                'address' => 'Branka Radicevica 5',
                'city' => 'Nis',
                'zip' => '18000',
                'country' => 'Serbia',
                'phone' => '0655229060',
                'user_id' => 1,
            ],

        ];
        UserAddress::insert($usersAddresses);
    }
}
