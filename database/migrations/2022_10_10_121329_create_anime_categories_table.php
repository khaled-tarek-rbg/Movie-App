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
        Schema::create('anime_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->references('id')->on('categories')->cascadeOnDelete();
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
        Schema::dropIfExists('anime_categories');
    }
};
