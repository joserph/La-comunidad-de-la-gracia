<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('predicadores', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 50);
		    $table->string('url', 50);
		    $table->integer('id_user');
		    $table->string('tipo', 50);
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
		Schema::dropIfExists('predicadores');
	}

}
