@extends('layouts.scaffold1')

@section('main')

<h1>Show Post</h1>

<p>{{ link_to_route('posts.index', 'Return to all posts') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $post->post_title }}}</td>
			<td>{{{ $post->post_content }}}</td>
        <td>{{ link_to_route('posts.edit', 'Edit', array($image->id), array('class' => 'btn btn-info')) }}</td>
        <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
		</tr>
	</tbody>
</table>

@stop
