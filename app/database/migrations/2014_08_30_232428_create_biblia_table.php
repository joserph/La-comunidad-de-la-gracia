<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biblia', function($table)
		{
		    $table->increments('id');

		    $table->string('libro', 50);
		    $table->integer('capitulo');
		    $table->integer('versiculo');
		    $table->string('content', 500);
		    $table->integer('id_user');
		    $table->integer('update_user');
		    $table->integer('cont');

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
		Schema::dropIfExists('biblia');
	}

}
