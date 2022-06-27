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
            ['status_name'=>'Menunggu Pembayaran'],
            ['status_name' => 'Menunggu Pembayaran dikonfirmasi'],
            ['status_name' => 'Menunggu Paket dikirimkan'], //bayar udah dikonfirmasi
            ['status_name' => 'Paket sedang dalam pengiriman'],
            ['status_name' => 'Transaksi Selesai'],
        ]);
    }
}
