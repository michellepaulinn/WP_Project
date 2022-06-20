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
                ['category_name' => 'Outer'],
                ['category_name' => 'Tops'],
                ['category_name' => 'Bottoms'],
                ['category_name' => 'Accessories']
            ]
            );
    }
}
