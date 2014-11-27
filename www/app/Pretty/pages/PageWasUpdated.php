<?php namespace Pretty\pages;

class PageWasUpdated {

  public $page;

  function __construct( Page $page )
  {
    $this->page = $page;

  }

}
