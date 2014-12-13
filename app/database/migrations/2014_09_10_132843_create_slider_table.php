<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider', function($table)
		{
		    $table->increments('id');

		    $table->string('titulo', 100);		    
		    $table->string('ruta', 300);
		    $table->string('content', 800);
		    $table->string('f_nombre', 50);		    
		    $table->string('f_ruta', 300);
		    $table->string('f_exten', 5);
		    $table->integer('id_user');		    
		    $table->integer('update_user');
		    $table->string('tipo', 50);
		    
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
		Schema::dropIfExists('slider');
	}

}
