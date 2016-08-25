<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cincharge');
            $table->string('cobjective');
            $table->date('cdate');
            $table->integer('cnumber')->index();
            $table->integer('stotal');
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
        Schema::drop('captures');
    }
}
