<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name' => 'Lucifer','email' => 'admorales64@misena.edu.co','password' => '123456789','role_id' => 1],
            ['name' => 'Juliii','email' => 'jsrubiano06@misena.edu.co','password' => '123456789','role_id' => 1],
            ['name' => 'Sarita','email' => 'sshurtado2@misena.edu.co','password' => '123456789','role_id' => 1],
        );
        foreach($users as $value){
            $user = new User();
            $user->name = $value['name'];
            $user->email = $value['email'];
            $user->password = Hash::make($value['password']);
            $user->role_id = $value['role_id'];
            $user->save();
        }
    }
}
