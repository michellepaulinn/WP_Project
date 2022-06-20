<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::insert([
            [
                'role_id' => 1,
                'account_name' => 'Admin 1',
                'account_email' => 'Admin1@test.com',
                'account_password' => Hash::make('Admin123')
            ],
            [
                'role_id' => 2,
                'account_name' => 'User 1',
                'account_email' => 'User1@test.com',
                'account_password' => Hash::make('User123')
            
            ]
        ]);
    }
}
