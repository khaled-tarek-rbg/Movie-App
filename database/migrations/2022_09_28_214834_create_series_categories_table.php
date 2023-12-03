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
        Schema::create('series_categories', function (Blueprint $table) {
            $table->foreignId('cat_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('serie_id')->references('id')->on('series')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series_categories');
    }
};
