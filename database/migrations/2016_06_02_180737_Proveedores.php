<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('providers', function(Blueprint $table){
          $table->increments('id');

          $table->string( 'prov_name');
          $table->string( 'prov_doc_type');
          $table->date(   'prov_doc_date');
          $table->integer('prov_doc_number')->unique();
          $table->integer('prov_doc_value');
          $table->string( 'prov_doc_detalle');

          $table->string( 'check_number');
          $table->integer('check_value');
          $table->string( 'check_bank');
          $table->date(   'check_date');
          $table->string( 'comment');
          $table->integer('number')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('providers');
    }
}
