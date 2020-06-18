<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->double('cantidad');
            $table->integer('noPagos');
            $table->double('cuota');
            $table->double('totalPagar');
            $table->date('fechaMinistracion');
            $table->date('fechaVencimiento');

            $table->timestamps();

            $table->foreign('client_id')
            ->references('id')
            ->on('clients');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
