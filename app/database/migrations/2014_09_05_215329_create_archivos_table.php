<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('archivos', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 50);		    
		    $table->string('ruta', 300);
		    $table->string('exten', 5);
		    $table->string('tipo', 255);
		    $table->string('tamano', 255);
		    $table->integer('id_user');
		    $table->integer('estado');
		    $table->string('name', 500);

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
		Schema::dropIfExists('archivos');
	}

}
