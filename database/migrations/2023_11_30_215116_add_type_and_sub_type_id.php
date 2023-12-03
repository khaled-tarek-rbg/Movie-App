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
        Schema::table('t_v_s', function (Blueprint $table) {

            $table->foreignId('subtype_id')->references('id')->on('sub_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_v_s', function (Blueprint $table) {
            $table->dropColumn('subtype_id');

        });
    }
};
