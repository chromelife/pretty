@extends('layouts.scaffold')

@section('main')
	<div id="slideshow" class="dragslider">
		<section class="img-dragger img-dragger-large dragdealer">
			<div class="handle">
				@foreach ($images as $image)
					<div class="slide" data-content="content-{{$image->title}}">
					<div class="img-wrap"><img src="{{$image->image_url}}" alt=""/></div>
					<h2>Title Not Working Yet<span>Cause I didn't account for it really</span></h2>
					<button class="content-switch">Read more</button>
				</div>
				@endforeach
			</div>
		</section><!-- /img-dragger-->
		
		<!-- Content section -->
		
		<section class="pages">
		@foreach ($posts as $post)
			<div class="content" data-content="content-{{$post->id}}">
				<h2>{{$post->title}}</h2>
				<p>{{$post->content}}</p>
				<p class="related">
				Foo!
				</p>
			</div>
		@endforeach	
		</section>
	</div>
@stop
