<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('factura_id')->nullable(); 
            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->unsignedInteger('producto_id')->nullable(); 
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->double('precio', 8, 2);            
            $table->integer('cantidad');
            $table->double('iva', 8, 2);
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
        Schema::dropIfExists('detalle_facturas');
    }
}
