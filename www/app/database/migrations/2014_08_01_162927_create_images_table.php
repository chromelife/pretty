<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image_url');
			$table->string('title');
			$table->boolean('isVisible');
			$table->unsignedInteger('page_id');
			$table->timestamps();
		});

		// Schema::table('images', function($table)
		// {
		// 	$table->foreign('page_id')->references('id')->on('pages')->onUpdate('cascade')->onDelete('cascade');
		// });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
