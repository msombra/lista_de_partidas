<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_partidas', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('time_principal');
            $table->integer('tipo_adversario');
            $table->string('time_adversario')->nullable();
            $table->integer('dia');
            $table->time('horario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_partidas');
    }
};
