<?php namespace Pretty\pages;

use Pretty\eventing\EventGenerator;


class Page extends \Eloquent {
	
	use EventGenerator;

	protected $fillable = [ 'image_id', 'post_id', 'isVisible' ];

	public function post()
	{
		return $this->hasOne('Post');
	}

	public function image()
	{
		return $this->hasOne('Image');
	}

	public function storePage( $image_id, $post_id, $isVisible )
	{
	
		$page = new Page;
		$page->image_id = $image_id;
		$page->post_id = $post_id;
		$page->save();

		$id = $page->id;

		$page = Page::find($id);
		$page->image()->update(array('page_id' => $id));

		
		
		

		// $page->post()->page_id = $page->id;	
		

		

		$page->raise( new PageWasStored( $page ));

		return $page;
	}

}