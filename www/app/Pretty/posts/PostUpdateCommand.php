<?php namespace Pretty\posts;

// use Log;

class PostUpdateCommand {
	
	public $id;

	public $title;

	public $content;

	public $isVisible; 

	function __construct( $id, $title, $content, $isVisible )
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->isVisible = $isVisible; 
	}
}

