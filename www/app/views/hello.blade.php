@extends('layouts.scaffold')

@section('main')
	<div id="slideshow" class="dragslider">
		<section class="img-dragger img-dragger-large dragdealer">
			<div class="handle">
				@foreach ($pages as $page)
					<div class="slide" data-content="content-{{$page->page_id}}">
					<div class="img-wrap"><img src="{{$page->image->image_url}}" alt=""/></div>
					<h2>{{$page->post->title}}<span>Subtitle? oh you needed that?</span></h2>
					<button class="content-switch">Read more</button>
				</div>
				@endforeach
			</div>
		</section><!-- /img-dragger-->
		
		<!-- Content section -->
		
		<section class="pages">
		@foreach ($pages as $page)
			<div class="content" data-content="content-{{$page->page_id}}">
				<h2>{{$page->post->title}}</h2>
				<p>{{$page->post->content}}</p>
				<p class="related">
				Foo!
				</p>
			</div>
		@endforeach	
		</section>
	</div>
@stop
