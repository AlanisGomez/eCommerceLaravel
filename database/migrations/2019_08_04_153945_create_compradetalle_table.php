<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompradetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradetalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->char('talle',6);
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('producto');
            $table->unsignedInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compra');
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
        Schema::dropIfExists('compradetalle');
    }
}
