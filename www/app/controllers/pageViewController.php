<?php

class pageViewController extends \BaseController {

	protected static $restful = true;

	public function constructPageView() {

	 $pages = DB::select(
		DB::raw('
			select * from pages
			inner join images on pages.image_id = images.id
			inner join posts on pages.post_id = posts.id
		 '));


		// $queries = DB::getQueryLog();
		// dd($queries);
		return View::make('hello', compact('pages'));
	}

}
