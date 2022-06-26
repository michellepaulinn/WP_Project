<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionDetail::insert([
            [
                'transaction_id'=>1,
                'item_id' => 2
            ],
            [
                'transaction_id'=>1,
                'item_id' => 1
            ],
            [
                'transaction_id'=>1,
                'item_id' => 3
            ]
        ]);
    }
}
