<?php

namespace Database\Seeders;

use App\Models\ItemImage;
use Illuminate\Database\Seeder;

class ItemImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemImage::insert([
            [
                'item_id'=>1,
                'item_image' => 'Crop-Cardigan.jpg'
            ],
            [
                'item_id'=>1,
                'item_image' => 'cardigan.jpg'
            ],
            [
                'item_id'=>2,
                'item_image' => 'cardigan.jpg'
            ],
            [
                'item_id'=>3,
                'item_image' => 'Korean-Outer.jpg'
            ],
            [
                'item_id'=>4,
                'item_image' => 'Cream-Cardigan.jpg'
            ],
            [
                'item_id'=>5,
                'item_image' => 'Black-Blouse.jpg'
            ],
            [
                'item_id'=>6,
                'item_image' => 'Bhumi-Top.jpg'
            ],
            [
                'item_id'=>7,
                'item_image' => 'Vneck-Shirt.jpg'
            ],
            [
                'item_id'=>8,
                'item_image' => 'Mamba-Tshirt.jpg'
            ],
            [
                'item_id'=>9,
                'item_image' => 'Cream-Trousers.jpg'
            ],
            [
                'item_id'=>10,
                'item_image' => 'Black-Skirt.jpg'
            ],
            [
                'item_id'=>11,
                'item_image' => 'Red-Skirt.jpg'
            ],
            [
                'item_id'=>12,
                'item_image' => 'Plaid-Pants.jpg'
            ],
            [
                'item_id'=>13,
                'item_image' => 'Knit-Headband.png'
            ],
            [
                'item_id'=>14,
                'item_image' => 'Dior-Sunglasses.jpg'
            ],
            [
                'item_id'=>15,
                'item_image' => 'Pearl-Necklace.jpg'
            ],
            [
                'item_id'=>16,
                'item_image' => 'Pearl-Set.jpg'
            ],
            
        ]);
    }
}
