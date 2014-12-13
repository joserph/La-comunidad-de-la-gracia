<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios', function($table)
		{
		    $table->increments('id');

		    $table->string('nombre', 200);	
		    $table->string('comentario', 600);		    		    
		    $table->integer('id_user');	    
		    $table->integer('id_articulo');
		    
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
		Schema::dropIfExists('comentarios');
	}

}
