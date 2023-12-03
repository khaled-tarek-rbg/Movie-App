<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('t_v_eposides_comments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('tv_eposide_id')->references('id')->on('t_v_eposides')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('t_v_eposides_comments');
    }
};
