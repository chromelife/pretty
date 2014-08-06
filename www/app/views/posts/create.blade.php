@extends('layouts.scaffold1')

@section('main')

<h1>Create Post</h1>

{{ Form::open(['route' => 'posts.store', 'files'=>true]) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::text('content') }}
        </li>

        <li>
            {{ Form::label('isVisible', 'Is visible:') }}
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


