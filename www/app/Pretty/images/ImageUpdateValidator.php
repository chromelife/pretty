<?php namespace Pretty\images;

use Validator;
// use Log;

use Pretty\validation\ValidationException;

class ImageUpdateValidator {

	public function validate( ImageUpdateCommand $command )
	{
		$validator = Validator::make([
			'title' => $command->title,
			'isVisible' => $command->isVisible
		],[
			'title' => 'required',
			'isVisible' => 'required|boolean'
			]);

		if ($validator->fails())
		{
			throw new ValidationException($validator->messages());
		}
	}
	
}
