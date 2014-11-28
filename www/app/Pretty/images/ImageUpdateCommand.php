<?php namespace Pretty\images;

class ImageUpdateCommand {

	public $id;

	public $title;

	public $isVisible;

	function __construct( $id, $input )
	{
		$this->id = $id;
		$this->input = $input; 

	}
}
