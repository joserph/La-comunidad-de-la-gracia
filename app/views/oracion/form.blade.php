<div class="errors_form"></div>

<div style="display: none" class="success_message text-success lead success"><strong></strong></div>
<div class="form">
              
    {{ Form::open(array('url' => 'oracion', 'class' => 'peticion_ajax')) }}
    
    {{ Form::label('nombre', 'Nombre:') }}
    {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder' => 'Tu Nombre')) }}
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Tu Email')) }}
    {{ Form::label('peticion', 'Petición:') }}
    {{ Form::textarea('peticion', Input::old('peticion'), array('class' => 'form-control')) }}
    {{ Form::label('Captcha', 'Captcha:') }} <br> 
    {{ Form::image(Captcha::img(), 'Captcha image') }}
    {{ Form::text('captcha', null, array('class' => 'form-control', 'placeholder' => 'Ingresa el captcha')) }}
    <br>
    {{ Form::submit('Crear Petición', array("class" => "btn btn-success", 'id' => 'oracion')) }}

    {{ Form::close() }}
    <div style='margin: 10px 0px 0px 300px' class='before'></div> 
</div>

