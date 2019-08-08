<?php

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

        $this->call(seederCategoria::class);
        $this->call(seederUser::class);
        Factory(App\marca::class,15)->create();
        Factory(App\producto::class,50)->create();
    }
}
