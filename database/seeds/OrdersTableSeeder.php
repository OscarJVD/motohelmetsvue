<?php

use App\Order;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
        	$order = new Order();
        	$order->dateOrder = $faker->date($format = 'Y-m-d', $max = 'now');
        	$order->total = $faker->numberBetween($min = 10000, $max = 100000);
        	$order->observations = $faker->realtext(rand(50,100));
            $order->person_id = $faker->numberBetween($min = 1, $max = 3);
            $order->status = 'En progroceso';
            $order->save();
        }

    }
}
