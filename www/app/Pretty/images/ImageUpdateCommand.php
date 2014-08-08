<?php namespace Pretty\images;

class ImageUpdateCommand {
	
	public $id;

	public $title;

	public $isVisible;

	function __construct( $id, $title, $isVisible )
	{
		$this->id = $id;
		$this->title = $title;
		$this->isVisible = $isVisible; 
		
	}
}
