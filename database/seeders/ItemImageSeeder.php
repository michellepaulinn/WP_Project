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
                'item_image' => 'https://cf.shopee.co.id/file/ae3d3c7ee0e2395d5bb50710dba6f536'
            ],
            [
                'item_id'=>2,
                'item_image' => 'https://cf.shopee.co.id/file/ae3d3c7ee0e2395d5bb50710dba6f536'
            ],
            [
                'item_id'=>3,
                'item_image' => 'https://cf.shopee.co.id/file/ae3d3c7ee0e2395d5bb50710dba6f536'
            ],
            [
                'item_id'=>4,
                'item_image' => 'https://cf.shopee.co.id/file/ae3d3c7ee0e2395d5bb50710dba6f536'
            ],
            [
                'item_id'=>5,
                'item_image' => 'https://cf.shopee.co.id/file/ae3d3c7ee0e2395d5bb50710dba6f536'
            ],
            
        ]);
    }
}
