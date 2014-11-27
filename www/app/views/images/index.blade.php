@extends('layouts.scaffold1')

@section('main')



<div class="content">
@if (Session::get('flash_message'))
	<div class="flash">
		{{ Session::get('flash_message')}}
	</div>
@endif


<h1>All Images</h1>

<p>{{ link_to_route('images.create', 'Add new image') }}</p>

@if ($images->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Image Name</th>
				<th>Image Location</th>
				<th>Image Preview</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($images as $image)
				<tr>
					<td>{{{ $image->image_name }}}</td>
					<td><a href="/images/{{ $image->id}}"/>{{$image->image_url}}</td>
					<td><img src="{{$image->image_url}}" class="img-thumbnail"/></td>
					<td>{{ link_to_route('images.edit', 'Edit', array($image->id), array('class' => 'btn btn-info')) }}</td>
            <td>
              {{ Form::open(array('method' => 'DELETE', 'route' => array('images.destroy', $image->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            	{{ Form::close() }}
            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	There are no images
@endif

@stop
