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
        Schema::create('sub_series', function (Blueprint $table) {
            $table->id();

            $table->integer('serie_number');
            $table->foreignId('serie_id')->references('id')->on('series')->cascadeOnDelete();
            $table->foreignId('season_id')->references('id')->on('seasons')->cascadeOnDelete();
            $table->float('eposide_rate');

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
        Schema::dropIfExists('sub_series');
    }
};
