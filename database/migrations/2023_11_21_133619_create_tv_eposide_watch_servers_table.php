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
        Schema::create('tv_eposide_watch_servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tv_id')->references('id')->on('t_v_s')->cascadeOnDelete();
            $table->foreignId('eposide_id')->references('id')->on('t_v_eposides')->cascadeOnDelete();
            $table->foreignId('season_id')->references('id')->on('t_v_seasons')->cascadeOnDelete();
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
        Schema::dropIfExists('tv_eposide_watch_servers');
    }
};
