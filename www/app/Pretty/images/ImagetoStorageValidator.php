<?php namespace Pretty\images;

use Validator;
use File;
// use Log;

use Pretty\validation\ValidationException;

class ImagetoStorageValidator {

	public function validate( ImagetoStorageCommand $command )
	{
		$validator = Validator::make([
			'image' => $command->file,
			'title' => $command->title,
			'isVisible' => $command->isVisible
		],[
			'image' => 'image|required',
			'title' => 'required',
			'isVisible' => 'required|boolean'
			]);

		if ($validator->fails())
		{
			throw new ValidationException($validator->messages());
		}
	}
	
}

