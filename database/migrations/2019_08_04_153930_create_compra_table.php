<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->Increments('id');
            $table->date('fec_compra');
            $table->integer('num_factura');
            $table->double('total');
            $table->char('medio_pago',3);
            $table->char('tipo_comprobante',3);
            $table->char('moneda',3);
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('compra');
    }
}
