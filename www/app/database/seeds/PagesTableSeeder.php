<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{	
		// DB::table('posts')->truncate();
		
		$pages = [
			['image_id'=> '1', 'post_id' => '1','isVisible'=>'1'],
			['image_id'=> '2', 'post_id' => '2','isVisible'=>'1'],
			['image_id'=> '3', 'post_id' => '3','isVisible'=>'1'],
			['image_id'=> '4', 'post_id' => '4','isVisible'=>'1'],
			['image_id'=> '5', 'post_id' => '5','isVisible'=>'1'],
			['image_id'=> '6', 'post_id' => '6','isVisible'=>'1'],
			['image_id'=> '7', 'post_id' => '7','isVisible'=>'1'],
			['image_id'=> '8', 'post_id' => '8','isVisible'=>'1']

		];


		DB::table('pages')->insert($pages);	
	}

}
