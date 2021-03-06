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

@if ($pages != null)
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Page Id</th>
				<th>Title</th>
				<th>Image</th>
				<th>Is Visible?</th>

			</tr>
		</thead>

		<tbody>
			@foreach ($pages as $page)
				<tr>
					<td>{{{ $page->id }}}</td>
					<td>{{{ $page->post_title }}}</td>
					<td>{{{ $page->image_url }}}</td>
					<td>{{{ $page->isVisible }}}</td>
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
