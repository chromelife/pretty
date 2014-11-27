<?php


class ImagesTableSeeder extends Seeder {

	public function run()
	{
		// DB::table('posts')->truncate();

		$images=[
			['image_name'=>'1','image_url'=>'/Photos/1.jpg'],
			['image_name'=>'2','image_url'=>'/Photos/2.jpg'],
			['image_name'=>'3','image_url'=>'/Photos/3.jpg'],
			['image_name'=>'4','image_url'=>'/Photos/4.jpg'],
			['image_name'=>'5','image_url'=>'/Photos/5.jpg'],
			['image_name'=>'6','image_url'=>'/Photos/6.jpg'],
			['image_name'=>'7','image_url'=>'/Photos/7.jpg'],
			['image_name'=>'8','image_url'=>'/Photos/8.jpg']


		];

	DB::table('images')->insert($images);
	}

}
