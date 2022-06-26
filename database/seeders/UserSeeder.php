<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role_id' => 1,
                'name' => 'Admin 1',
                'email' => 'Admin1@test.com',
                'password' => Hash::make('Admin123')
            ],
            [
                'role_id' => 2,
                'name' => 'User 1',
                'email' => 'User1@test.com',
                'password' => Hash::make('User123')
            ]
        ]);
    }
}
