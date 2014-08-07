<?php namespace Pretty\posts;

// use Log;

class PostWasStored {

	public $post;

	function __construct( Post $post )
	{
		$this->post = $post;
		
	}



}