<?php

namespace Database\Seeders;

use App\Models\ImageSlider;
use Illuminate\Database\Seeder;

class ImageSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ImageSlider::insert([
            [
                'slider_image' => 'event-day.jpg',
            ],
            [
                'slider_image' => 'event-day1.jpg',
            ],
            [
                'slider_image' => 'thrift-education.jpg',
            ],
            [
                'slider_image' => 'promo.jpg',
            ]
        ]);
    }
}
