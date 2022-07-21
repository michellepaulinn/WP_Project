<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(
            [
                [
                    'category_name' => 'Outer',
                    'category_slug' => 'outer',
                    'category_thumbnail' => 'https://cf.shopee.co.id/file/36499895b1f3656e855de178ed496006'
                ],

                [
                    'category_name' => 'Tops',
                    'category_slug' => 'tops',
                    'category_thumbnail' => 'https://i.pinimg.com/originals/f9/15/70/f91570c38dbaf402361eb14afd4c5999.png'
                ],

                [
                    'category_name' => 'Bottoms',
                    'category_slug' => 'bottoms',
                    'category_thumbnail' => 'https://im.berrybenka.com/assets/upload/product/zoom/233942_bell-bottom-long-pants_navy_2H3TG.jpg'
                ],

                [
                    'category_name' => 'Accessories',
                    'category_slug' => 'accessories',
                    'category_thumbnail' =>'https://i.pinimg.com/originals/4b/2a/60/4b2a60c4af786f89a7afb1fc3a6ac8b2.jpg'
                ]
            ]
        );
    }
}
