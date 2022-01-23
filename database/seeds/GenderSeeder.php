<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->insert([
            'name'=>"Masculino",
        ]);
        DB::table('genero')->insert([
            'name'=>"Femenino",
        ]);
        DB::table('genero')->insert([
            'name'=>"Otro",
        ]);
    }
}
