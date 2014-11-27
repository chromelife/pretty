<?php namespace Pretty\pages;

class PageWasDeleted {

  public $page;

  function __construct( Page $page )
  {
    $this->page = $page;

  }

}
