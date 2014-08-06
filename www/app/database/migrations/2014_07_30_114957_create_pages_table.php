<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
// 	public function up()
// 	{
// 		Schema::create('pages', function(Blueprint $table)
// 		{
// 			$table->engine = 'InnoDB';
// 			$table->increments('id')->unique;
// 			$table->timestamps();
// 			$table->unsignedInteger('image_id');
// 			$table->unsignedInteger('post_id');
// 		});

// 		Schema::table('pages', function($table)
// 		{
	
// 			$table->engine = 'InnoDB';
// 			$table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');
// 			$table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
				
// 		});
// 	}


// 	/**
// 	 * Reverse the migrations.
// 	 *
// 	 * @return void
// 	 */
// 	public function down()
// 	{
// 		Schema::drop('pages');
// 	}

}
