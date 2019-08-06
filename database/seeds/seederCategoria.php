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
            "imagen"=>"images/eCommerce1.png"
          ],
          [
            "nombre"=>"Homber",
            "descripcion"=>"Ropa de Hombre",
            "imagen"=>"images/eCommerce4.png"
          ],
          [
            "nombre"=>"Niños",
            "descripcion"=>"Ropa de Niños",
            "imagen"=>"images/eCommerce21.png"
          ]
          
        ]
        );

    }
}
