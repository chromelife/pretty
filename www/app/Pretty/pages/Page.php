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

	public function storePage( $input )
	{

		$page = new Page;
		$page->image_id = $input['image_id'];
		$page->post_id = $input['post_id'];
		$page->isVisible = $input['isVisible'];
		$page->save();

		$page->raise( new PageWasStored( $page ));

		return $page;
	}

	public function updatePage( $id, $input ){

		$page = $this->findOrFail( $id );

		$page->image_id = $input['image_id'];
		$page->post_id = $input['post_id'];
		$page->isVisible = $input['isVisible'];
		$page->update();

		$page->raise( new PageWasUpdated( $page ));

	}

	public function deletePage(){

		$this->delete();

		$this->raise( new PageWasDeleted( $this ));
	}

}
