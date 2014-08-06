<?php namespace Pretty\posts;

// use Log;

class PostToStorageCommand {
	
	public $title;

	public $isVisible;

	public $content;

	function __construct( $title, $isVisible, $content )
	{
		$this->title = $title;
		$this->isVisible = $isVisible; 
		$this->content = $content;
	}
}

