<?php namespace Pretty\posts;

class PostWasDeleted {
	
	public $post;

	function __construct( Post $post )
	{
		$this->post = $post;
		
	}

}	
