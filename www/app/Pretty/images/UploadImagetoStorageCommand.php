<?php namespace Pretty\Images;

class UploadImageToStorageCommand {
	
	public $title;
	public $visible;
	public $image_url;

	function __construct($title, $visible, $image_url)
	{
		Image->title = $title;
		Image->visible = $visible;
		Image->image_url = $image_url;
		Image->save();
	}
}