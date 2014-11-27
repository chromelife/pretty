@extends('layouts.scaffold1')

@section('main')
  <div="content">
    <h1>Edit Page</h1>
      {{ Form::model($page, array('method' => 'PATCH', 'route' => array('pages.update', $page->id))) }}
        <ul>
          <li>
            {{ Form::label('image', 'Image:') }}
            {{ Form::select('image_id', $pageImages ) }}
          </li>

          <li>
            {{ Form::label('post', 'Post:') }}
            {{ Form::select('post_id', $pagePosts ) }}
          </li>

          <li>
            {{ Form::label('isVisible', 'Publish?') }}
            {{ Form::input('string', 'isVisible') }}
          </li>

          <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('pages.show', 'Cancel', $page->id, array('class' => 'btn')) }}
          </li>
        </ul>

      {{ Form::close() }}
  </div>
@if ($errors->any())
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
@endif
</div>

@stop
