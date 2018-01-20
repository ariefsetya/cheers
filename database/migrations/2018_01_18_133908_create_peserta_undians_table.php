<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaUndiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_undians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_undian');
            $table->string('code');
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->string('seat_number');
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
        Schema::dropIfExists('peserta_undians');
    }
}
