<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mes', function($table)
		{
		    $table->increments('id');

		    $table->string('fecha', 50);
		    $table->string('url', 50);
		    $table->string('tipo', 50);
		    $table->integer('id_user');
		    $table->string('estatus', 50);
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
		Schema::dropIfExists('mes');
	}

}
