@extends('layouts.scaffold-editor')

@section('main')

<h1>Create Post</h1>

{{ Form::open(['route' => 'posts.store']) }}
  <div class="title-editable" id="post_title"> Title </div>
	<div class="content-editable" id="post_content"> Content </div>
{{ Form::submit('Submit', array('class' => 'btn btn-info', 'id' => 'form-submit')) }}


{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
