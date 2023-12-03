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
        Schema::create('tv_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->references('id')->on('categories')->cascadeOnDelete();
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
        Schema::dropIfExists('tv_categories');
    }
};
