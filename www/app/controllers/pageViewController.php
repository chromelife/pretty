<?php

class pageViewController extends \BaseController {

	protected static $restful = true;

	public function constructPageView() {

		$query = '
			select * from pages
			inner join images on pages.image_id = images.image_id
			inner join posts on pages.post_id = posts.image_id
			where pages.isVisible = 1
		';

		$pages = DB::select( DB::raw( $query ) );

		return View::make('hello', compact('pages'));
	}

}
