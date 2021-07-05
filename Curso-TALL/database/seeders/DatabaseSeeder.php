<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//importando modelo de subscriber
use App\Models\Subscriber;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #Creando 10 instancias para la base de datos
        Subsciber::factory(10)->create();
    }
}
