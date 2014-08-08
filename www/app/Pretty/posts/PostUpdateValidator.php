<?php namespace Pretty\posts;

use Validator;
// use Redirect;
use Pretty\validation\ValidationException;

class PostUpdateValidator {
	
	public function validate( PostUpdateCommand $command )
	{
		$validator = Validator::make([
			'title' => $command->title,
			'content' => $command->content,
			'isVisible' => $command->isVisible
		],[
			'title' => 'required',
			'content' => 'required',
			'isVisible' => 'boolean|required'
		]);
		
		if ($validator->fails())
		{
			throw new ValidationException ($validator->messages());
		}
		
	}
	
}