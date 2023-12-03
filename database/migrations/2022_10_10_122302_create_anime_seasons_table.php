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
        Schema::create('anime_seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('season_number');
            $table->text('season_poster');
            $table->integer('season_production_year');
            $table->foreignId('anime_id')->references('id')->on('animes')->cascadeOnDelete();
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
        Schema::dropIfExists('anime_seasons');
    }
};
