<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('predicas', function($table)
		{
		    $table->increments('id');

		    $table->string('title', 80);
		    $table->string('url', 80);
		    $table->string('predicador', 30);
		    $table->string('mes', 15);
		    $table->string('anio', 15);
		    $table->string('fecha', 80);
		    $table->string('content', 5000);
		    $table->string('estatus');
		    $table->integer('id_user');
		    $table->string('tipo', 20);
		    $table->integer('update_user');
		    $table->string('audio', 500);
		    $table->string('f_name', 200);
		    $table->string('f_ruta', 500);
		    $table->string('f_exten', 5);
		    $table->string('comentario', 2);

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
		Schema::dropIfExists('predicas');
	}

}
