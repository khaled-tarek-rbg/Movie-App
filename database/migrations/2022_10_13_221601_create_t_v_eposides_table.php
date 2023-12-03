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
        Schema::create('t_v_eposides', function (Blueprint $table) {
            $table->id();
            $table->integer('serie_number');
            $table->foreignId('tv_id')->references('id')->on('t_v_s')->cascadeOnDelete();
            $table->foreignId('season_id')->references('id')->on('t_v_seasons')->cascadeOnDelete();




          

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
        Schema::dropIfExists('t_v_eposides');
    }
};
