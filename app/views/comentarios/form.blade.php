<div>
	<div class="load_ajax">
		@foreach($comentarios as $comment)
			@if($comment->id_articulo == $predica->id)
				<p class="text-success lead"><strong>~{{ $comment->nombre }}~</strong></p>
				<p><em>{{ $comment->comentario }}</em></p>
				<small>
				<p class="text-muted">Publicado el 
					{{ date("d/m/Y", strtotime($comment->created_at)) }}
				</p>
				</small>
				<hr>
			@endif
		@endforeach
	</div>
	<div class="errors_form"></div>

    <div style="display: none" class="success_message success"></div>
</div>
@if(Auth::check())
<div class="form">
              
    {{ Form::open(array('url' => 'comentarios', 'class' => 'register_ajax')) }}
    
    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="id_articulo" value="{{ $predica->id }}" id="articulo">
    {{ Form::label('nombre', 'Nombre:') }}

    {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder' => 'Nombre de usuario')) }}
    
    {{ Form::label('comentario', 'Comentario:') }}

    {{ Form::textarea('comentario', Input::old('comentario'), array('class' => 'form-control')) }}
    <br>
    {{ Form::submit('Crear Comentario', array("class" => "btn btn-success", 'id' => 'frm')) }}

    {{ Form::close() }}
</div>
@else
<h3>Para comentar crea una cuenta 
	<a href="{{ URL::route('account-create') }}" class="btn btn-success btn-sm">Aquí</a> 
</h3>

@endif
