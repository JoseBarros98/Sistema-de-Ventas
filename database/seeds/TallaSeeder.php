<?php

use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tallas')->insert([
            'talla'            =>      "S",
            
        ]);

        DB::table('tallas')->insert([
            'talla'            =>      "M",
            
        ]);

        DB::table('tallas')->insert([
            'talla'            =>      "L",
            
        ]);
        
        DB::table('tallas')->insert([
            'talla'            =>      "X",
            
        ]);

        DB::table('tallas')->insert([
            'talla'            =>      "XL",
            
        ]);

        DB::table('tallas')->insert([
            'talla'            =>      "XXL",
            
        ]);

        DB::table('tallas')->insert([
            'talla'            =>      "XXXL",
            
        ]);
        
    }
}
