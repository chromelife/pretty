<?php namespace Pretty\posts;

class PostWasUpdated {
	
	public $post;

	function __construct( Post $post )
	{
		$this->post = $post;
		
	}

}	
