<?php

use App\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = array(
    		['name' => 'Orejitas'],
    		['name' => 'colas'],
    		['name' => 'bombones'],
    		['name' => 'chaqueta'],
    		['name' => 'guantes'],
    	);
    	$faker = Faker::create();
        foreach ($product as $value) {
        	$product = new Product();
        	$product->barcode = $faker->numberBetween($min = 5000, $max = 20000);
        	$product->name = $value['name'];
        	$product->quantity = $faker->numberBetween($min = 1, $max = 100);
        	$product->price = $faker->numberBetween($min = 12713, $max = 500000);
        	$product->features = $faker->realtext();
        	$product->images = $faker->url;
            $product->brand_id = $faker->numberBetween($min = 1, $max = 5);
            $product->subcategory_id = $faker->numberBetween($min = 1, $max = 3);
            $product->status = 'Activo';
            $product->save();
        }
    }
}
