<?php

use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'detalle'   =>      "bolsillo izq",
        ]);

        DB::table('servicios')->insert([
            'detalle'   =>      "bolsillo der",
        ]);

        DB::table('servicios')->insert([
            'detalle'   =>      "pecho izq",
        ]);

        DB::table('servicios')->insert([
            'detalle'   =>      "pecho der",
        ]);

        DB::table('servicios')->insert([
            'detalle'   =>      "espalda",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "manga_izq",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "manga_der",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "pierna_izq",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "pierna_der",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "cuello",
        ]);
        
        DB::table('servicios')->insert([
            'detalle'   =>      "nombres",
        ]);

    }
}
