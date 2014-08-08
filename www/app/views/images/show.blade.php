@extends('layouts.scaffold1')

@section('main')

<h1>Show Image</h1>

<p>{{ link_to_route('images.index', 'Return to all images') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Image_url</th>
			<th>Title</th>
			<th>Visible</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $image->image_url }}}</td>
			<td>{{{ $image->title }}}</td>
			<td>{{{ $image->isVisible }}}</td>
			<td>{{ link_to_route('images.edit', 'Edit', array($image->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('images.destroy', $image->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>
<div>
	<img src="{{{ $image->image_url }}}"/>
</div>
@stop
