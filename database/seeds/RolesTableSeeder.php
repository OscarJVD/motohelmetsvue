<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = array (
            ['name' => 'Administrador'],
            ['name' => 'Vendedor'],
            ['name' => 'Cliente'],
        );
        foreach($roles as $value){
            $roles = new Role;
            $roles->name = $value['name'];
            $roles->status = "Activo";
            $roles->save();
        }
    }
}
