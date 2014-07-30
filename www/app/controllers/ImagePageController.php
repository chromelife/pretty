<?php

class ImagePageController extends \BaseController {

	protected static $restful = true;

	public function showHeaderImages () {
		$images = Image::where('visible', '=', '1')->get();
		return View::make('hello', compact('images'));
	}
}

