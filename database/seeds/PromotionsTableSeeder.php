<?php

use App\Promotion;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 5; $i++) {
        	$promotion = new Promotion();
        	$promotion->starDate = $faker->date($format = 'Y-m-d', $max = 'now');
        	$promotion->endDate = $faker->date($format = 'Y-m-d', $max = 'now');
            $promotion->status = 'Activo';
            $promotion->porcentage = 50;
            $promotion->priceBefore = $faker->numberBetween($min = 12713, $max = 500000);
            $promotion->priceAfter = $faker->numberBetween($min = 12713, $max = 500000);
            $promotion->product_id = $faker->numberBetween($min = 1, $max = 5);
        	$promotion->save();
        }

    }
}
