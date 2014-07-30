<?php


class ImagesTableSeeder extends Seeder {

	public function run()
	{
		$images=[
			['title'=>'1','image_url'=>'/Photos/1.jpg','visible'=>'1'],
			['title'=>'2','image_url'=>'/Photos/2.jpg','visible'=>'1'],
			['title'=>'3','image_url'=>'/Photos/3.jpg','visible'=>'1'],
			['title'=>'4','image_url'=>'/Photos/4.jpg','visible'=>'1'],
			['title'=>'5','image_url'=>'/Photos/5.jpg','visible'=>'1'],
			['title'=>'6','image_url'=>'/Photos/6.jpg','visible'=>'1'],
			['title'=>'7','image_url'=>'/Photos/7.jpg','visible'=>'1'],
			['title'=>'8','image_url'=>'/Photos/8.jpg','visible'=>'1']
			

		];

	DB::table('images')->insert($images);	
	}

}