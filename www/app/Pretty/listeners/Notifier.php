<?php namespace Pretty\listeners;

use Pretty\Eventing\EventListener;
use Pretty\Images\ImageWasStored;
use Pretty\Images\ImageWasUploaded;
use Pretty\Images\ImageWasDeleted;
use Pretty\Posts\PostWasStored;

class Notifier extends EventListener{

	public function whenImageWasStored( ImageWasStored $event )
	{
		$flash_message = ( 'Send notification about event' . $event->image->image_url );
	}

	public function whenImageWasUploaded( ImageWasUploaded $event )
	{
		$flash_message = ( 'Send notification about event' . $event->image->image_url );
	}

	public function whenPostWasStored( PostWasStored $event )
	{
		$flash_message = ( 'Send notification about event'. $event->post->title);
	}

	public function whenImageWasDeleted( ImageWasDeleted $event )
	{
		$flash_message = ( 'Send notification about event'. $event->image->image_url );
	}
}