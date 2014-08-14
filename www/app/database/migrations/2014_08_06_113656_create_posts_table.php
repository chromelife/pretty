<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('content' , 8000);
			$table->boolean('isVisible');
			$table->unsignedInteger('page_id');
			$table->timestamps();
		});

		// Schema::table('posts', function($table)
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
		Schema::drop('posts');
	}

}
