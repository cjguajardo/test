<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spends', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sdate');
            $table->string('stype');
            $table->integer('snumber');
            $table->string('sprovider');
            $table->string('sconcept');
            $table->integer('samount');
            $table->integer('captureid');
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
        Schema::drop('spends');
    }
}
