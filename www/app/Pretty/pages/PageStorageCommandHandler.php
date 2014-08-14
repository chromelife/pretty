<?php namespace Pretty\pages;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
use Log;

class PageStorageCommandHandler implements CommandHandler {

	protected $page;
	protected $dispatcher;

	function __construct( Page $page, EventDispatcher $dispatcher)
	{
		$this->page = $page;
		$this->dispatcher = $dispatcher;
		
	}

	public function handle( $command )
	{
		$page = $this->page->storePage(
			$command->image_id,
			$command->post_id,
			$command->isVisible
			
		);
		
		// Dispatch events
		$this->dispatcher->dispatch( $page->releaseEvents() );
		
	}

}
