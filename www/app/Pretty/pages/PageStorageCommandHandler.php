<?php namespace Pretty\pages;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;

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
			$command->input

		);

		// Dispatch events
		$this->dispatcher->dispatch( $page->releaseEvents() );

	}

}
