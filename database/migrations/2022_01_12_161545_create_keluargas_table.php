<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->int('individu_id')->unsigned();
            $table->string('peran');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('individu_id')->references('id')->on('individus')->phponUpdate('casade')->onDelete('casade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keluargas');
    }
}
