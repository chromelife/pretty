<?php namespace Pretty\images;

// use Log;

class ImageToStorageCommand {
	
	public $title;

	public $isVisible;

	public $image_url;

	function __construct( $title, $isVisible, $image_url )
	{
		$this->title = $title;
		$this->isVisible = $isVisible; 
		$this->image_url = $image_url;
	}
}