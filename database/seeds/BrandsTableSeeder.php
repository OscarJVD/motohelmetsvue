<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        $brands = array(
        	['name' => 'SHARK'],
        	['name' => 'AGV'],
        	['name' => 'Bell'],
        	['name' => 'Bikeit'],
        	['name' => 'Bikers'],

        );
        foreach ($brands as $value) {
        	$brands = new Brand;
        	$brands->name = $value['name'];
        	$brands->status = 'Activo';
        	$brands->save();
        }

    }
}
