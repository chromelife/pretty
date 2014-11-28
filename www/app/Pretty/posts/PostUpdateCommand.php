<?php namespace Pretty\posts;

// use Log;

class PostUpdateCommand {

	public $id;

	public $input;

	function __construct( $id, $input )
	{
		$this->id = $id;
		$this->input = $input;
	}
}
