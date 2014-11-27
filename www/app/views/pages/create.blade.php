@extends('layouts.scaffold1')

@section('main')

<h1>Create New Page</h1>


{{ Form::open(['route' => 'pages.store']) }}
	<ul>
        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::select('image_id', $pageImages ) }}
        </li>

        <li>
            {{ Form::label('post', 'Post:') }}
            {{ Form::select('post_id', $pagePosts ) }}
        </li>

        <li>
            {{ Form::label('isVisible', 'Publish?') }}
            {{ Form::text('isVisible') }}
        </li>


		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
