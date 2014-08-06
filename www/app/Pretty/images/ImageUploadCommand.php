<?php namespace Pretty\images;

class ImageUploadCommand {

	public $file;
	public $filename;
	public $destinationPath;

	function __construct( $file, $filename, $destinationPath )
	{
		$this->file = $file;
		$this->filename = $filename;
		$this->destinationPath = $destinationPath;
	}
}