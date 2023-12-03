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
        Schema::create('serie_watch_servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->references('id')->on('series')->cascadeOnDelete();
            $table->foreignId('eposide_id')->references('id')->on('sub_series')->cascadeOnDelete();
            $table->foreignId('season_id')->references('id')->on('seasons')->cascadeOnDelete();


            $table->string('url');

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
        Schema::dropIfExists('serie_watch_servers');
    }
};
