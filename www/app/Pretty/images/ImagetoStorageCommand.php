<?php namespace Pretty\images;

use Log;

class ImageToStorageCommand {
	
	 

	public $title;
	public $visible;
	public $image_url;

	

	function __construct($title, $visible, $image_url)
	{
		$this->title = $title;
		$this->visible = $visible; 
		$this->image_url = $image_url;
		Log::info("Value of visible in ImagetoStorageCommand [$this->visible]");
	}
}