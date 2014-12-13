<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronjobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cronjobs', function($table)
		{
		    $table->increments('id');

		    $table->string('tipo', 50);		    
		    $table->string('dia', 50);
		    $table->integer('id_user');
		    $table->integer('update_user');
		    $table->integer('id_tarea');

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
		Schema::dropIfExists('cronjobs');
	}

}
