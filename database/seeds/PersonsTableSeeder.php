<?php

use App\Person;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persons = array(
            ['name' => 'Andres David ','lastName' => 'Morales Castro','typeDoc' => 'Tarjeta de Identidad','numberDoc' => 1001092346,'phone' => 316411145,'email' => 'admorales64@misena.edu.co','user_id' => '1'],
            ['name' => 'Sara Sofia','lastName' => 'Hurtado Trilleras','typeDoc' => 'Tarjeta de Identidad','numberDoc' => 1000215205,'phone' => 312458922,'email' => 'sshurtado2@misena.edu.co','user_id' => '2'],
            ['name' => 'Juliana Stefanny','lastName' => 'Rubiano Molano','typeDoc' => 'Tarjeta de Identidad','numberDoc' => 1024523056,'phone' => 321735825,'email' => 'jsrubiano06@misena.edu.co','user_id' => '3'],
        );
        $faker = Faker::create();
        foreach ($persons as $value) {
            $person = new Person;
            $person->name = $value['name'];
            $person->lastName = $value['lastName'];
            $person->typeDoc = $value['typeDoc'];
            $person->numberDoc = $value['numberDoc'];
            $person->phone = $value['phone'];
            $person->address = $faker->address;
            $person->email = $value['email'];
            $person->user_id = $value['user_id'];
            $person->status = 'Activo';
            $person->save();
        }

    }
}
