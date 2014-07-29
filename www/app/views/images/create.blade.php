@extends('layouts.scaffold1')

@section('main')

<h1>Create Image</h1>

{{ Form::open(['route' => 'images.store', 'files'=>true]) }}
	<ul>
        <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('image') }}
        </li>

        <li>
            {{ Form::label('uploaded_on', 'uploaded_on:') }}
            {{ Form::text('uploaded_on') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>


        <li>
            {{ Form::label('visible', 'Visible?') }}
            {{ Form::text('visible') }}
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


