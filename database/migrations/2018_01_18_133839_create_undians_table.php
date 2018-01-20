<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUndiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');// lottery title
            $table->string('stops');// manual/auto
            $table->integer('max_running');// maximum running times, 0 for manual ended
            $table->integer('duration');// in second
            $table->integer('status');// 1 idle 2 in progress 3 completed
            $table->integer('running_status');// 1 idle 2 running 3 completed
            $table->text('configuration');//json string for views config
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
        Schema::dropIfExists('undians');
    }
}
