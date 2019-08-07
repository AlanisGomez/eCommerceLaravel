<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre',60);
            $table->string('apellido',60);
            $table->string('email',190)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('fec_nac');
            $table->char('doc_tipo',3);
            $table->integer('documento');
            $table->string('domicilio',80);
            $table->string('telefono',15);
            $table->char('sexo',1);
            $table->char('rol',15);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
