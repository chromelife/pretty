<?php namespace Pretty\images;

class ImagetoStorageValidator {

	public function validate(ImagetoStorageCommand $command)
	{
		$validator = Validator::make([
			'title'=> $command->title,
			'isVisible'=>$command->isVisible,
		],[
			'title'=> 'required',
			"isVisible" => 'required'

		]);
	}

}

