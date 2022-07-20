<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::insert([
            ['status_name'=>'Waiting for payment'],
            ['status_name' => 'Waiting for payment to be confirmed'],
            ['status_name' => 'Waiting for order to be shipped'], //bayar udah dikonfirmasi
            ['status_name' => 'Order is shipped'],
            ['status_name' => 'Transaction Completed'],
            ['status_name' => 'Cancelled'],

        ]);
    }
}
