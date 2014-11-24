<?php namespace Pretty\posts;

// use Log;

class PostToStorageCommand {

	public $input;

	function __construct( $input )
	{
		$this->input = $input;
	}
}
