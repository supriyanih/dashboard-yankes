<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYankesKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yankes_kamar', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('tahun')->unsigned()->index();
            $table->string('bulan', 2)->index();
            $table->datetime('tanggal')->index();
            $table->integer('count')->unsigned()->index();
            $table->string('via')->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yankes_kamar');
    }
}
