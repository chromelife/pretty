<?php namespace Pretty\images;

use Validator;
use Redirect;
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
			'isVisible' => 'required'
			]);

		if ($validator->fails())
		{
			throw new ValidationException($validator->messages());
		}
	}
	
}

