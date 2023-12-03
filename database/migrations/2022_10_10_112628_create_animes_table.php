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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('production_year');
            $table->float('rate');
            $table->integer('anime_views')->default(0);
            $table->foreignId('type_id')->references('id')->on('types')->cascadeOnDelete();
            $table->foreignId('subtype_id')->references('id')->on('sub_types')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->text('poster');
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
        Schema::dropIfExists('animes');
    }
};
