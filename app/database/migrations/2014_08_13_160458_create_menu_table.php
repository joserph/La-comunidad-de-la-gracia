<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 50);
		    $table->string('url', 50);
		    $table->string('estatus', 50);
		    $table->integer('peso');
		    $table->string('tipo', 50);
		    $table->integer('id_user');
		    $table->integer('id_expan');
		    $table->string('padre', 50);
		    $table->string('cat', 50);
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
		Schema::dropIfExists('menu');
	}

}
