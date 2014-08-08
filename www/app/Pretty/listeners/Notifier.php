<?php namespace Pretty\listeners;

use Log;
use Pretty\Eventing\EventListener;
use Pretty\Images\ImageWasStored;
use Pretty\Images\ImageWasUpdated;
use Pretty\Images\ImageWasDeleted;
use Pretty\Posts\PostWasStored;
use Pretty\Posts\PostWasUpdated;
use Pretty\Posts\PostWasDeleted


class Notifier extends EventListener{

	public function whenImageWasStored( ImageWasStored $event )
	{
		Log::info( 'Image was stored in DB and on server:' . $event->image->title );
	}
	
	public function whenImageWasUpdated( ImageWasUpdated $event )
	{
		Log::info( 'Image was Updated:' . $event->post->title) ;
	}

	public function whenImageWasDeleted( ImageWasDeleted $event )
	{
		Log::info ( 'Image deleted from DB and server:'. $event->image->title . '(' . $event->image->image_url . ')' );
	}

	public function whenPostWasStored( PostWasStored $event )
	{
		Log::info ( 'Post was stored in DB:'. $event->post->title );
	}

	public function whenPostWasUpdated( PostWasUpdated $event )
	{
		Log::info( 'Post was Updated:' . $event->post->title) ;
	}

	public function whenPostWasDeleted( PostWasDeleted $event )
	{
		Log::info ( 'Post deleted from DB:'. $event->post->title );
	}
}