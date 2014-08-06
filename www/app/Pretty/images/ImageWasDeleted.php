<?php namespace Pretty\images;

class ImageWasDeleted {
	
	public $image;

	function __construct( Image $image )
	{
		$this->image = $image;
	}
}