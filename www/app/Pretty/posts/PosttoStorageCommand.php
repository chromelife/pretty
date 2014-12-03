<?php namespace Pretty\posts;

// use Log;

class PostToStorageCommand {

	public $input;

	function __construct( $post_title, $post_content )
	{
		$this->post_title = $post_title;
		$this->post_content = $post_content;
	}
}
