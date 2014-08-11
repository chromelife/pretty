@extends('layouts.scaffold1')

@section('main')



<div class="content">
@if (Session::get('flash_message'))
	<div class="flash">
		{{ Session::get('flash_message')}}
	</div>
@endif 


<h1>All Pages</h1>

<p>{{ link_to_route('pages.create', 'Add new page') }}</p>

@if ($pages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Page Id</th>
				<th>Image</th>
				<th>Post</th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($pages as $page)
				<tr>
					<td>{{{ $page->id }}}</td>
					<td>{{{ $page->image->image_url }}}</td>
					<td>{{{ $page->post->title }}}</td>
                    <td>{{ link_to_route('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
	There are no pages
@endif

@stop
