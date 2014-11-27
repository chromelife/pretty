<?php namespace Pretty\pages;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;

class PageUpdateCommandHandler implements CommandHandler {

  protected $page;
  protected $dispatcher;

  function __construct( Page $page, EventDispatcher $dispatcher )
  {
    $this->page = $page;
    $this->dispatcher = $dispatcher;

  }

  public function handle( $command )
  {
    $page = $this->page->findOrFail ($command->id);

    $page = $this->page->updatePage(
      $command->id,
      $command->input
    );
    
    // Dispatch events
    $this->dispatcher->dispatch( $page->releaseEvents() );

  }

}
