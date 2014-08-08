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
				<th>Image_url</th>
				<th>Title</th>
				<th>Visible?</th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($images as $image)
				<tr>
					<td><a href="/images/{{ $image->id}}"/>{{$image->image_url}}</td>
					<td>{{{ $image->title }}}</td>
					<td>{{{ $image->isVisible }}}</td>
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
