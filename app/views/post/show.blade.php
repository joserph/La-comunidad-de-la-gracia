@extends ('master.layout')

@section ('content')

    <p>
      <a href="{{ route('post.create') }}" class="btn btn-primary">Crear un nuevo post</a>
    </p>

    Title: {{ $post->title }} <br>
    Url: {{ $post->url }} <br>
    Content: {{ $post->content }} <br>
  
@stop