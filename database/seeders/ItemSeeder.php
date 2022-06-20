<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(
        [
            [
                'category_id' => 1,
                'item_name' => 'Crop Cardigan',
                'item_price' => 50000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 1,
                'item_name' => 'Cardigan',
                'item_price' => 20000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 1,
                'item_name' => 'Korean Outer',
                'item_price' => 45000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 1,
                'item_name' => 'Cream Cardigan',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 2,
                'item_name' => 'Black Blouse',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 2,
                'item_name' => 'Bhumi Top',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 2,
                'item_name' => 'Cake Shirt',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 2,
                'item_name' => 'Mamba T-shirt',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 3,
                'item_name' => 'Cream Trousers',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 3,
                'item_name' => 'Black Skirt',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 3,
                'item_name' => 'Red Skirt',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 3,
                'item_name' => 'Plaid Pants',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 4,
                'item_name' => 'Knit Headband',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 4,
                'item_name' => 'Dior Sunglasses',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 4,
                'item_name' => 'Pearl Necklace',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ],
            [
                'category_id' => 4,
                'item_name' => 'Pearl Set',
                'item_price' => 30000,
                'description' => ' contoh description ',
                'item_status' => true
            ]
        ]
        );
    }
}
