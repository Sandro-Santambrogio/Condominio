<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('orden_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('orden_id')->constrained('ordenes');
            $table->string('detalle');
            $table->integer('cantidad');
            $table->integer('monto');
            $table->integer('monto_total');
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orden_detalles');
    }
}
