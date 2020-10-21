<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
        	['name' => 'Cascos'],
        	['name' => 'Chalecos'],
        	['name' => 'Guantes'],
        );
        foreach ($categories as  $value) {
        	$categories = new Category;
        	$categories->name = $value['name'];
            $categories->status = 'Activo';
        	$categories->save();
        }

    }
}
