<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatUndiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_undians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_undian');//from peserta_undians
            $table->integer('id_peserta');//from peserta_undians
            $table->string('status');// win / loss 
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
        Schema::dropIfExists('riwayat_undians');
    }
}
