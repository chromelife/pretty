<?php namespace Pretty\images;

class ImageDeleteCommand {

	public $id;

	function __construct($image_id)
	{
		$this->image_id = $image_id;
	}
}
