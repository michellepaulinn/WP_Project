<?php

namespace Database\Seeders;

use App\Models\ImageSlider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
            ItemImageSeeder::class,
            CartSeeder::class,
            TransactionStatusSeeder::class,
            TransactionSeeder::class,
            TransactionDetailSeeder::class,
            ImageSliderSeeder::class
        ]);

        //Seeder Post
        // Pake cara ini biar lebih cepat
        // Post::create(
        //     [
        //         'title' => 'Judul Pertama',
        //         'slug' => 'judul-pertama',
        //         'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis felis sapien. Cras fermentum lorem vitae odio volutpat, ut efficitur felis tempus. Maecenas auctor at elit vitae vestibulum.',
        //         'body' =>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis felis sapien. Cras fermentum lorem vitae odio volutpat, ut efficitur felis tempus. Maecenas auctor at elit vitae vestibulum. Aenean pharetra commodo euismod. Proin fringilla sed ligula vitae ultricies. Curabitur blandit pretium urna eu venenatis. Proin accumsan ligula vel consectetur euismod. Proin dignissim consectetur dictum. Phasellus non urna maximus, suscipit ipsum sit amet, bibendum velit. Praesent viverra sem ut tortor fermentum scelerisque. Aliquam tempor dictum tristique. Vestibulum ac ultrices risus, et iaculis dui. Nunc et vehicula massa. Sed mollis massa enim, vel suscipit orci efficitur vitae. Vivamus eget nibh lacinia, iaculis.',
        //         'category_id' => 1,
        //         'user_id' => 1
        //     ],
        //     [
        //          ....
        //          ....
        //     ], dst
        // );
        //Seeder 
        
       
    }
}
