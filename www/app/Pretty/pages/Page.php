<?php namespace Pretty\pages;

use Pretty\eventing\EventGenerator;


class Page extends \Eloquent {

	use EventGenerator;

	public function post(){
		return $this->hasOne('Post');
	}

	public function image(){
		return $this->hasOne('Image');
	}

	protected $fillable = [ 'image_id', 'post_id', 'isVisible' ];

	public function storePage( $image_id, $post_id, $isVisible )
	{

		$page = new Page;
		$page->image_id = $image_id;
		$page->post_id = $post_id;
		$page->push();

		$id = $page->id;

		$page = Page::find($id);


		$page->raise( new PageWasStored( $page ));

		return $page;
	}

}
