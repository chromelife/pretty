<?php namespace Pretty\pages;

class PageWasStored {

	public $page;

	function __construct( Page $page )
	{
		$this->page = $page;
		
	}

}