<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{	
		$pages = [
			['image_id'=> '1', 'post_id' => '1'],
			['image_id'=> '2', 'post_id' => '2'],
			['image_id'=> '3', 'post_id' => '3'],
			['image_id'=> '4', 'post_id' => '4'],
			['image_id'=> '5', 'post_id' => '5'],
			['image_id'=> '6', 'post_id' => '6'],
			['image_id'=> '7', 'post_id' => '7'],
			['image_id'=> '8', 'post_id' => '8']

		];


		DB::table('pages')->insert($pages);	
	}

}
