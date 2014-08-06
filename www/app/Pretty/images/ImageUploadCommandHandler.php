<?php namespace Pretty\images;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;

class ImageUploadCommandHandler implements CommandHandler {
	
	protected $dispatcher;
	protected $image;
		
	function __construct( Image $image, EventDispatcher $dispatcher )
	{
		$this->dispatcher = $dispatcher;
		$this->image = $image;
	}

	public function handle ( $command )
	{
		$image = $this->image->uploadImage($command->file,	$command->filename,	$command->destinationPath);

		$this->dispatcher->dispatch ( $image->releaseEvents() );
	}
}