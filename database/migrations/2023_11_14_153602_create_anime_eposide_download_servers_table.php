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
        Schema::create('anime_eposide_download_servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')->references('id')->on('animes')->cascadeOnDelete();
            $table->foreignId('eposide_id')->references('id')->on('anime_eposides')->cascadeOnDelete();
            $table->foreignId('season_id')->references('id')->on('anime_seasons')->cascadeOnDelete();

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
        Schema::dropIfExists('anime_eposide_download_servers');
    }
};
