<?php namespace Pretty\posts;

use Validator;
use Redirect;
use Pretty\validation\ValidationException;

class PosttoStorageValidator {

	public function validate( PosttoStorageCommand $command )
	{
		$validator = Validator::make([
			'title' => $command->title,
			'content' => $command->content,
			'isVisible' => $command->isVisible
		],[
			'title' => 'required',
			'content' => 'required',
			'isVisible' => 'required'
			]);

		if ($validator->fails())
		{
			throw new ValidationException($validator->messages());
		}
	}
	
}