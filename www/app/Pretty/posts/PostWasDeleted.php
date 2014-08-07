<?php namespace Pretty\images;

class PostWasDeleted {
	
	public $post;

	function __construct( Post $post )
	{
		$this->post = $post;
	}
}