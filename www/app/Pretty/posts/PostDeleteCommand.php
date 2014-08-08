<?php namespace Pretty\posts;

class PostDeleteCommand {
	
	public $id;

	function __construct($id)
	{
		$this->id = $id;
	}
}