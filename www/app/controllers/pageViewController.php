<?php 

class pageViewController extends \BaseController {
	
	protected static $restful = true;

	public function constructPageView() {
		$images = Image::where('isVisible', '=', '1')->get();
		$posts = Post::where('isVisible', '=', '1')->get();
		return View::make('hello', compact('images', 'posts'));
	}

}