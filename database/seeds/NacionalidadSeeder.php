<?php

use Illuminate\Database\Seeder;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidads')->insert([
            'pais'=>"Argentina",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Bolivia",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Brasil",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Chile",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"China",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Colombia",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Costa Rica",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Cuba",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Ecuador",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"El Salvador",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"España",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Estados Unidos",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Francia",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Guatemala",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Honduras",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Italia",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Japón",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"México",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Paraguay",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Perú",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"República Dominicana",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Uruguay",
        ]);
        DB::table('nacionalidads')->insert([
            'pais'=>"Venezuela",
        ]);
    }
}
