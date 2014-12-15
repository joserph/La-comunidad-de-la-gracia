$(document).ready(function()
{
	$('.navbar-nav1 li a.dropdown-toggle1').click(function(e)
	{
		e.preventDefault();
		$(this).parent().toggleClass('open1');
	});
	$('[data-toggle="collapse"]').click(function()
	{
		var target = $(this).attr('data-target');
		$(target).toggleClass('in1');
	});
	/*****/
	$("#frm").submit(function(e){
        e.preventDefault();
        var nombre = $("input#nombre").val();
        var comentario =  $("input#comentario").val();
        var dataString = 'nombre='+nombre+'&comentario='+comentario; 
        $.ajax({
            type: "POST",
            url : "comentarios",
            data : dataString,
            success : function(data){
                console.log(data);
            }
        },"json");

	});

	/******************/

	var form = $('.register_ajax');
	    form.bind("submit",function ()
	    {
	        $.ajax({
	            type: form.attr('method'),
	            url: form.attr('action'),
	            data: form.serialize(),
	            beforeSend: function(){
                    $('.before').append('<img src="assets/img/before.gif" />');
                },
	            complete: function(data){
	            	
	            },
	            success: function (data) {	
	            	$(".before").hide();
					$(".errors_form").html("");
					$(".success_message").hide().html("");
	            	if(data.success == false){
		            	var errores = "";
		            	for(datos in data.errors){
		            		errores += "<small class='error alert-danger'>" + data.errors[datos] + "</small> <br>";
		            	}
		            	$(".errors_form").html(errores)
		            }else{
		            	$(form)[0].reset();//limpiamos el formulario
		            	$(".success_message").show().html(data.message)
		            	$(".load_ajax").html(usuarios)
						var usuarios = "";		
					    
					    for(datos in data.posts)
					    {
					    	if(data.posts[datos].id_articulo == $('#articulo').val()){
					    	usuarios += '<p class="text-success lead"><strong>~'+ data.posts[datos].nombre +'~</strong></p>';
					    	usuarios += '<p><em>'+ data.posts[datos].comentario +'</em></p>';
					    	usuarios += '<p class="text-muted">Publicado el '+ data.posts[datos].created_at +'</p>';
					    	usuarios += '<hr>';
							}
					    }
					    	

					    $(".load_ajax").html(usuarios)
		            }
	            },
	            error: function(errors){
	            	$(".before").hide();
					$(".errors_form").html("");
	            	$(".errors_form").html(errors);
	            }
	        });
	   		return false;
		});

/**********************/


});

$(document).ready(function()
{
	
	$("#oracion").submit(function(e){
        e.preventDefault();
        var nombre = $("input#nombre").val();
        var email = $("input#email").val();
        var peticion =  $("input#peticion").val();
        var dataString = 'nombre='+nombre+'&email='+email+'&comentario='+comentario; 
        $.ajax({
            type: "POST",
            url : "oracion",
            data : dataString,
            success : function(data){
                console.log(data);
            }
        },"json");

	});

	/******************/

	var form = $('.peticion_ajax');
	    form.bind("submit",function ()
	    {
	        $.ajax({
	            type: form.attr('method'),
	            url: form.attr('action'),
	            data: form.serialize(),
	            
	            complete: function(data){
	            	
	            },
	            success: function (data) {	
	            	$(".before").hide();
					$(".errors_form").html("");
					$(".success_message").hide().html("");
	            	if(data.success == false){
		            	var errores = "";
		            	for(datos in data.errors){
		            		errores += "<small class='error alert-danger'>" + data.errors[datos] + "</small> <br>";
		            	}
		            	$(".errors_form").html(errores)
		            }else{
		            	$(form)[0].reset();//limpiamos el formulario
		            	$(".success_message").show().html(data.message)
		            	$(".load_ajax").html(usuarios)					    
		            }
	            },
	            error: function(errors){
	            	$(".before").hide();
					$(".errors_form").html("");
	            	$(".errors_form").html(errors);
	            }
	        });
	   		return false;
		});

/**********************/


});


$(document).ready(function()
	{
		var form = $('.votacion');
	    form.bind("submit",function ()
	    {

	        $.ajax({
	            type: form.attr('method'),
	            url: form.attr('action'),
	            data: form.serialize(),
	            beforeSend: function(){
                    $('.before').append('<img src="assets/css/loader3.gif" />');
                },
	            complete: function(data){
	            	
	            },
	            success: function (data) {	
	            	$(".before").hide();
					$(".errors_form").html("");
					$(".success_message").hide().html("");
					$('.voto').attr('disabled', 'disabled');
					$('#frm').attr('disabled', 'disabled')
	            	if(data.success == false){
		            	var errores = "";
		            	for(datos in data.errors){
		            		errores += "<small class='error alert-danger'>" + data.errors[datos] + "</small> <br>";
		            	}
		            	$(".errors_form1").html(errores)
		            }else{
		            	$(form)[0].reset();//limpiamos el formulario
		            	$(".success_message").show().html(data.message)		
		            	$(".numero").show().html(data.numerov+' Votos')				    	
		            	$(".promedio").show().html(data.promedio+'/5')
		            }
	            },
	            error: function(errors){
	            	$(".before").hide();
					$(".errors_form").html("");
	            	$(".errors_form").html(errors);
	            }
	        });
	   		return false;
	   		
		});
	});