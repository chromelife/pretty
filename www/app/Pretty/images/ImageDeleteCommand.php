<?php namespace Pretty\images;

class ImageDeleteCommand {
	
	public $id;

	function __construct($id)
	{
		$this->id = $id;
	}
}