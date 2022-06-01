<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
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
            $product = new Product;
            $product->user_role_id = 1;
            $product->category_id = 1;
            $product->title = $faker->title;
            $product->description = $faker->paragraph;
            $product->price = $faker->numberBetween($min = 10000, $max = 200000);
            $product->quantity = $faker->numberBetween($min = 10, $max = 50);
            $product->is_active = 1;
            $product->low_inventory = $faker->numberBetween($min = 1, $max = 10);;
            $product->is_featured = 0;
            $product->is_free_shipping = 0;
            $product->shipping_charges = $faker->numberBetween($min = 100, $max = 200);;
            $product->is_rating_allowed = 1;
            $product->is_comment_allowed = 1;
            $product->weight = $faker->numberBetween($min = 1, $max = 15);;
            $product->gold_rate_id = 1;
            $product->save();
        }
    }
}
