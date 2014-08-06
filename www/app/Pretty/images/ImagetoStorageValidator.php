<?php namespace Pretty\images;

use Validator;

class ImagetoStorageValidator {

	public function validate( ImagetoStorageCommand $command )
	{
		$validator = Validator::make([
			'title' => $command->title,
			'isVisible' => $command->isVisible,
		].[
			'title' => 'required',
			'isVisible' => 'required'
			]);

		// return $validation;

		if ($validator->fails())
		{
			return Redirect::route( 'images.create' )
			->withInput()
			->withErrors($validation)
			->with( 'message', 'Check yourself before you wreck yourself.' );
		}
	}
	
}

