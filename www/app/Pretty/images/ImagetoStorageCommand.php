<?php namespace Pretty\images;

use Log;

class ImageToStorageCommand {
	
	public $title;

	public $isVisible;

	public $file;

	function __construct( $title, $isVisible, $file )
	{
		$this->title = $title;
		$this->isVisible = $isVisible; 
		$this->file = $file;
		
		
	}
}