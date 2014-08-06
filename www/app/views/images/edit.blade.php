@extends('layouts.scaffold1')

@section('main')
<div="content">
<h1>Edit Image</h1>
{{ Form::model($image, array('method' => 'PATCH', 'route' => array('images.update', $image->id))) }}
	<ul>
        <li>
            {{ Form::label('image_url', 'Image url:') }}
            {{ Form::text('image_url') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('isVisible', 'Is visible:') }}
            {{ Form::input('string', 'isVisible') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('images.show', 'Cancel', $image->id, array('class' => 'btn')) }}
		</li>
        <li>
            <img src="{{ $image->image_url }}" alt="" />
        </li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>

@stop
