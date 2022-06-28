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
                'item_image' => 'gema.jpg'
            ],
            [
                'item_id'=>2,
                'item_image' => 'cardigan.jpg'
            ],
            [
                'item_id'=>3,
                'item_image' => 'cardigan.jpg'
            ],
            [
                'item_id'=>4,
                'item_image' => 'gema.jpg'
            ],
            [
                'item_id'=>5,
                'item_image' => 'gema.jpg'
            ],
            
        ]);
    }
}
