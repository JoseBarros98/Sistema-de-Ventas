<?php

use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulo')->insert([
            'codigo'=>"1",
            'nombre'=>"Camiseta Barcelona",
            'stock'=>"100",
            'descripcion'=>"Descripcion del primer articulo",
            'estado'=>"A",
            "idcategoria"=>"1",
        ]);
        DB::table('articulo')->insert([
            'codigo'=>"2",
            'nombre'=>"Mousepad Petrolero",
            'stock'=>"29",
            'descripcion'=>"Descripcion del segundo articulo",
            'estado'=>"A",
            "idcategoria"=>"2",
        ]);
    }
}
