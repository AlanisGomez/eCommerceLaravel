<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class seederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table("users")->insert([
                [
                  "nombre"=>"Usuario",
                  "apellido"=> "Demo",
                  "email"=>"usuario@demo.com",
                  "password"=>Hash::make("Secret123"),
                  "fec_nac"=>"1990-01-01",
                  "doc_tipo"=>"dni",
                  "documento"=>"40000000",
                  "domicilio"=>"Av Monroe 1010",
                  "telefono"=>"01115415161",
                  "sexo"=>"f",
                  "role"=>"admin"
              ],
              [
                "nombre"=>"Usuario2",
                "apellido"=> "Demo2",
                "email"=>"usuario2@demo.com",
                "password"=> Hash::make("Secret123"),
                "fec_nac"=>"1990-01-01",
                "doc_tipo"=>"dni",
                "documento"=>"40000001",
                "domicilio"=>"Av Monroe 1010",
                "telefono"=>"01115425262",
                "sexo"=>"m",
                "role"=>"customer"
            ]
          ]);
    }
}
