<?php


class ImagesTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('posts')->truncate();
		
		$images=[
			['title'=>'1','image_url'=>'/Photos/1.jpg','isVisible'=>'1', 'page_id'=> '1'],
			['title'=>'2','image_url'=>'/Photos/2.jpg','isVisible'=>'1', 'page_id'=> '2'],
			['title'=>'3','image_url'=>'/Photos/3.jpg','isVisible'=>'1', 'page_id'=> '3'],
			['title'=>'4','image_url'=>'/Photos/4.jpg','isVisible'=>'1', 'page_id'=> '4'],
			['title'=>'5','image_url'=>'/Photos/5.jpg','isVisible'=>'1', 'page_id'=> '5'],
			['title'=>'6','image_url'=>'/Photos/6.jpg','isVisible'=>'1', 'page_id'=> '6'],
			['title'=>'7','image_url'=>'/Photos/7.jpg','isVisible'=>'1', 'page_id'=> '7'],
			['title'=>'8','image_url'=>'/Photos/8.jpg','isVisible'=>'1', 'page_id'=> '8']
			

		];

	DB::table('images')->insert($images);	
	}

}
