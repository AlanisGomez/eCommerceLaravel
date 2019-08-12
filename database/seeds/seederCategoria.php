<?php

use Illuminate\Database\Seeder;

class seederCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("categoria")->insert([
                  [
                    "nombre"=>"Mujer",
                    "descripcion"=>"Ropa de Mujer",
                    "imagen"=>"images/mujer/eCommerce1.png"
                  ],
                  [
                    "nombre"=>"Hombre",
                    "descripcion"=>"Ropa de Hombre",
                    "imagen"=>"images/hombre/eCommerce4.png"
                  ],
                  [
                    "nombre"=>"Niños",
                    "descripcion"=>"Ropa de Niños",
                    "imagen"=>"images/ninios/eCommerce21.png"
                  ]
                ]
        );

    }
}
