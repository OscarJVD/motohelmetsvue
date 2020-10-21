<?php

use App\Subcategory;
use Faker\Factory as Faker; 
use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategory = array(
        	['name' => 'casco'],
        	['name' => 'chaquetas'],
        	['name' => 'guantes'],
        );
        $faker = Faker::create();
        foreach ($subcategory as $value) {
            $subcategory = new Subcategory;
            $subcategory->name = $value['name'];
            $subcategory->category_id = $faker->numberBetween($min = 1, $max = 3);
            $subcategory->status = 'Activo';
            $subcategory->save();
        }

    }
}
