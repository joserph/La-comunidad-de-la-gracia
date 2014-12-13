<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anuncios', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 50);
		    $table->string('estatus', 50);
		    $table->string('content', 500);
		    $table->date('fecha');
		    $table->time('hora');
		    $table->integer('id_user');
		    $table->integer('update_user');

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
		Schema::dropIfExists('anuncios');
	}

}
