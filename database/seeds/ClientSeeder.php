<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'Mariana',
            'first_surname' => 'Ramos',
            'second_surname' => 'García',
            'rfc' => 'Mrg051284yt',
            'email' => 'marianaramos@gmail.com',
            'address' => 'Colonia centro'
        ]);

        Client::create([
            'name' => 'Elias',
            'first_surname' => 'Juarez',
            'second_surname' => 'Piceno',
            'rfc' => 'Ejp051284yt',
            'email' => 'elias@gmail.com',
            'address' => 'Colonia centro',

        ]);

        Client::create([
            'name' => 'Jafet',
            'first_surname' => 'Rios',
            'second_surname' => 'Escalona',
            'rfc' => 'Jre051284yt',
            'email' => 'jafet@gmail.com',
            'address' => 'Colonia centro'
        ]);

        Client::create([
            'name' => 'Ana',
            'first_surname' => 'Morales',
            'second_surname' => 'Guzman',
            'rfc' => 'Amg051284yt',
            'email' => 'anamorales@gmail.com',
            'address' => 'Colonia centro'
        ]);
    }
}
