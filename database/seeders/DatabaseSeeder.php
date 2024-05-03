<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Empanada::factory(500)->create();
        \App\Models\Empanada::factory(1)->create([

            "id" => 1001,
            "nombre" => "ruperta",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1


        ]);
        \App\Models\Empanada::factory(1)->create([

            "id" => 1002,
            "nombre" => "ruperta2",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1


        ]);
        \App\Models\Empanada::factory(1)->create([

            "id" => 1003,
            "nombre" => "ruperta3",
            "tipo" => "Se hace la seria pero sabe lo que quiere, no es boba",
            "precio" => 1500,
            "cantidad" => 1


        ]);

        
        
    }
}
