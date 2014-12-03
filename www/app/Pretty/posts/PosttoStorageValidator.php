<?php namespace Pretty\posts;

use Validator;
use Redirect;
use Pretty\validation\ValidationException;

class PosttoStorageValidator {

	public function validate( PosttoStorageCommand $command )
	{

		$validator = Validator::make([
			// 'title' => $command->input['title'],
			// 'content' => $command->input['content']
			// 'title' => $command->post_title
		],[
			// 'title' => 'required'
			// 'content' => 'required'
		]);

		if ($validator->fails())
		{
			throw new ValidationException ($validator->messages());
		}

	}

}
