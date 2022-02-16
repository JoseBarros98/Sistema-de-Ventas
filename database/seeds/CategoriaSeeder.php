<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'nombre'            =>      "Deportivo",
            'descripcion'       =>      "A descripcion categoria",
            'condicion'         =>      "1",
        ]);

        DB::table('categoria')->insert([
            'nombre'            =>      "Otros",
            'descripcion'       =>      "B descripcion categoria ",
            'condicion'         =>      "1",
        ]);
    }
}
