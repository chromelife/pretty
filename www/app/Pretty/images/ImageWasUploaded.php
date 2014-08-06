<?php namespace Pretty\images;

use Log;

class ImageWasUploaded {

	public $image;

	function __construct( Image $image )
	{
		$this->image = $image;
		
	}

}