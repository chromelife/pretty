<?php namespace Pretty\posts;

use Log;

class PostToStorageCommand {
	
	 

	public $title;
	public $visible;
	public $content;

	

	function __construct($title, $visible, $content)
	{
		$this->title = $title;
		$this->visible = $visible; 
		$this->content = $content;
	}
}

