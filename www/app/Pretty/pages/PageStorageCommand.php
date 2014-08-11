<?php namespace Pretty\pages;

use Log;

class PageStorageCommand {
	
	public $image_id;

	public $post_id;

	function __construct( $image_id, $post_id )
	{
		$this->image_id = $image_id;
		$this->post_id = $post_id; 
				
	}
}