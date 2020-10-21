<?php

use App\MethodPayment;
use Illuminate\Database\Seeder;

class MethodPaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = array(
        	['name' => 'Efectivo'],
        	['name' => 'Targeta'],

        );
        foreach ($brands as $value) {
        	$brands = new MethodPayment;
        	$brands->name = $value['name'];
        	$brands->status = 'Activo';
        	$brands->save();
        }
    }
}
