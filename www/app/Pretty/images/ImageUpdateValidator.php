<?php namespace Pretty\images;

use Validator;
// use Log;

use Pretty\validation\ValidationException;

class ImageUpdateValidator {

	public function validate( ImageUpdateCommand $command )
	{
		$validator = Validator::make([
			'title' => $command->input['title'],
		],[
			'title' => 'required',
		]);

		if ($validator->fails())
		{
			throw new ValidationException($validator->messages());
		}
	}

}
