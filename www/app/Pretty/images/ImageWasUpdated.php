<?php namespace Pretty\images;

class ImageWasUpdated {
	
	public $image;

	function __construct( Image $image )
	{
		$this->image = $image;
	}
}