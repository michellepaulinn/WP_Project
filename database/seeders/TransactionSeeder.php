<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::insert([
            [
                'user_id' => 2,
                'transaction_date' => '2022-06-20',
                'transaction_status_id' => 2,
            ],
        ]);
    }
}
