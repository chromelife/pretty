<?php namespace Pretty\pages;

class PageUpdateCommand{

  public $id;

  public $input;

  function __construct( $id, $input){

    $this->id = $id;
    $this->input = $input;

  }
}
