<?php namespace Pretty\images;

// use Log;

class ImageWasStored {

	public $image;

	function __construct( Image $image )
	{
		$this->image = $image;
	}
}