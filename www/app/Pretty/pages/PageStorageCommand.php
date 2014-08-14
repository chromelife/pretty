<?php namespace Pretty\pages;

use Log;

class PageStorageCommand {
	
	public $image_id;

	public $post_id;

	public $isVisible;

	function __construct( $image_id, $post_id, $isVisible )
	{
		$this->image_id = $image_id;
		$this->post_id = $post_id; 
		$this->isVisible = $isVisible;
				
	}
}