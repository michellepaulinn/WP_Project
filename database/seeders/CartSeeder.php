<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cart::insert([
            [
                "account_id" => 1,
                "item_id" => 1,
            ],
            [
                "account_id" => 1,
                "item_id" => 2,
            ],
            [
                "account_id" => 1,
                "item_id" => 3,
            ]
        ]);
    }
}
