<?php namespace Pretty\images;

use Pretty\commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;

class ImageDeleteCommandHandler implements CommandHandler {

	protected $dispatcher;
	protected $image;

	function __construct( EventDispatcher $dispatcher, Image $image )
	{
		$this->image = $image;
		$this->dispatcher = $dispatcher;
	}

	public function handle ( $command )
	{
		$image = $this->image->findOrFail ($command->id);

		$image->deleteImage();

		$this->dispatcher->dispatch ( $image->releaseEvents() );
	}
}