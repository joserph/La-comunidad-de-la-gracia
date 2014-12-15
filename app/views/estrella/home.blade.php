<div class="form">              
    {{ Form::open(array('url' => 'estrella', 'class' => 'votacion form-inline')) }}    
	    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
	    <input type="hidden" name="id_post" value="{{ $predica->id }}" id="predica">
	    <div class="radio">
			<label>
			   	<input type="radio" name="voto" id="optionsRadios1" class="voto" value="1">
			   	@if($promedio >= 0.5)
			   		<img src="assets/css/estrelas11.png" alt="" width="30">
			   	@else 
			   		<img src="assets/css/estrelas1.png" alt="" width="30">
			   	@endif
			</label>
		</div>
		<div class="radio">
		  	<label>
			    <input type="radio" name="voto" id="optionsRadios2" class="voto" value="2">
			    @if($promedio >= 1.5)
			   		<img src="assets/css/estrelas22.png" alt="" width="30">
			   	@else 
			   		<img src="assets/css/estrelas2.png" alt="" width="30">
			   	@endif
		  	</label>
		</div>
		<div class="radio">
			<label>
			    <input type="radio" name="voto" id="optionsRadios3" class="voto" value="3">
			    @if($promedio >= 2.5)
			   		<img src="assets/css/estrelas33.png" alt="" width="30">
			   	@else 
			   		<img src="assets/css/estrelas3.png" alt="" width="30">
			   	@endif
			</label>
		</div>
		<div class="radio">
		  	<label>
			    <input type="radio" name="voto" id="optionsRadios4" class="voto" value="4">
			    @if($promedio >= 3.5)
			   		<img src="assets/css/estrelas44.png" alt="" width="30">
			   	@else 
			   		<img src="assets/css/estrelas4.png" alt="" width="30">
			   	@endif
		  	</label>
		</div>
		<div class="radio">
			<label>
			    <input type="radio" name="voto" id="optionsRadios5" class="voto" value="5">
			    @if($promedio >= 4.5)
			   		<img src="assets/css/estrelas55.png" alt="" width="30">
			   	@else 
			   		<img src="assets/css/estrelas5.png" alt="" width="30">
			   	@endif
			</label>
		</div>
	    {{ Form::submit('Votar', array("class" => "btn btn-success", 'id' => 'frm')) }}
    {{ Form::close() }}
</div>
<div>
	<din class="before"></din>
	<div class="numero">{{ $numerov }} Votos</div>
	<div class="promedio">{{ $promedio }}/5</div>
	<div class="load_ajax"></div>
	<div class="errors_form1"></div>
    <div style="display: none" class="success_message success"></div>
	
</div>