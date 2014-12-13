<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galerias', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 50);		    
		    $table->string('ruta', 300);
		    $table->string('exten', 5);
		    $table->string('ubicacion', 255);
		    $table->string('tamano', 255);
		    $table->integer('id_user');
		    $table->integer('estado');
		    $table->string('dir', 255);
		    
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
		Schema::dropIfExists('galerias');
	}

}
