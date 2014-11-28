<?php namespace Pretty\images;

use Log;

class ImageToStorageCommand {

	public $input;

	public $file;

	function __construct( $input, $file )
	{
		$this->input = $input;
		$this->file = $file;


	}
}
