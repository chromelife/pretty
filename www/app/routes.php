<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource( 'images',	'ImagesController' );

Route::resource( 'posts',	'PostsController' );

Route::resource( 'pages',	'PagesController' );

Route::get( '/', 'pageViewController@constructPageView');

Route::get('pagestest', function()
{
	foreach(Page::with('image', 'post')->get() as $page)
	{
		dd( $page->image, $page->post );
	}
});

