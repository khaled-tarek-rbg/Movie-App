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
        Schema::create('anime_movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('country');
            $table->integer('duration');
            $table->float('rate');
            $table->integer('movie_views')->default(0);
            $table->string('also_known_as')->nullable();
            $table->text('poster');
            $table->foreignId('type_id')->references('id')->on('types')->cascadeOnDelete();
            $table->foreignId('subtype_id')->references('id')->on('sub_types')->cascadeOnDelete();


            $table->integer('production_year');


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
        Schema::dropIfExists('anime_movies');
    }
};
