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
        Schema::create('t_v_seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('season_number');
            $table->text('season_poster');
            $table->integer('season_production_year');
            $table->foreignId('tv_id')->references('id')->on('t_v_s')->cascadeOnDelete();
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
        Schema::dropIfExists('t_v_seasons');
    }
};
