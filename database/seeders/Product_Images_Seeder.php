<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product_Image;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Product_Images_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=50; $i++)
        {
            $product_image = DB::table('product_images')->insert([
                'product_id' => $faker->numberBetween($min = 1, $max = 10),
                'image_path' => $faker->image('public/img', 400, 700),
                'is_main_image' => $faker->numberBetween($min = 0, $max = 1),
            ]);
        }
    }
}
