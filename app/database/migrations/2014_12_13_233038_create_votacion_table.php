<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estrellas', function($table)
		{
		    $table->increments('id');

		    $table->integer('voto');
		    $table->integer('id_user');
		    $table->integer('id_post')->unsigned();
		    $table->foreign('id_post')->references('id')->on('predicas')->onDelete('cascade');

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
		Schema::dropIfExists('estrellas');
	}

}
