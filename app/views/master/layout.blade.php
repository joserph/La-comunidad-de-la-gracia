<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Iglesia La Comunidad de la Gracia | Bendecidos para bendecir')</title>
    {{ HTML::style('assets/img/favicon.png', array('rel' => 'shortcut icon', 'type' => 'image/ico')) }}
    <meta property="twitter:account_id" content="415771776" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed" />
    <meta name="description" content="Somos una comunidad cristiana, ministrando el amor de Dios en el oeste de la ciudad de Caracas. Compartiendo la palabra de Dios, hemos ido creciendo sostenidamente al pasar de los años, extendiendo la enseñanza, junto a las familias radicadas en el área">
    <!-- twitter cards -->
    <meta name="twitter:site" content="@CdlGracia">
    <meta name="twitter:title" content="Iglesia La Comunidad de la Gracia | Bendecidos para bendecir">
    <meta name="twitter:description" content="Somos una comunidad cristiana, ministrando el amor de Dios en el oeste de la ciudad de Caracas. Compartiendo la palabra de Dios, hemos ido creciendo sostenidamente al pasar de los años, extendiendo la enseñanza, junto a las familias radicadas en el área">
    <meta name="twitter:creator" content="@CdlGracia">
    <meta name="twitter:image:src" content="https://www.comunidaddelagracia.com.ve/assets/img/Logo3D03-txt.png">
    <meta name="twitter:domain" content="comunidaddelagracia.com.ve">

    <meta property="og:site_name" content="Iglesia La Comunidad de la Gracia | Bendecidos para bendecir" />
    <meta property="fb:admins" content="258349247533549" />

    <!-- og tags google+ -->
    <meta itemprop="description" content="Somos una comunidad cristiana, ministrando el amor de Dios en el oeste de la ciudad de Caracas. Compartiendo la palabra de Dios, hemos ido creciendo sostenidamente al pasar de los años, extendiendo la enseñanza, junto a las familias radicadas en el área">
    
    {{ HTML::style('//fonts.googleapis.com/css?family=Lato:400,700,400italic') }}
	{{ HTML::style('assets/css/sliding.css') }}
	{{ HTML::style('assets/css/reset.css') }}
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/flatly-bootstrap.css', array('media' => 'screen')) }}  
	<!--Javascript-->
	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/menuresponsive.js') }}
	{{ HTML::script('assets/js/bootstrap.js') }}

  	<script>
    $(document).ready(function() {
      // Show or hide the sticky footer button
      $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
          $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
      });
 
      // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
 
        $('html, body').animate({scrollTop: 0}, 300);
      })
    });
  	</script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]--><!--[if (gte IE 6)&(lte IE 8)]>
    <![endif]-->

	<!--Fin Javascript-->
</head>
<body>
<div class="container">
	<!-- header -->
	<header>
		<div class="row">
  			<div class="col-md-12">{{ HTML::image('assets/img/header04.png', 'Cdlgracia-header', array('class' => 'img-responsive visible-lg animated3 fadeInDown3')) }}</div>
  			<div class="col-md-4"></div>
  			<div class="col-md-4 text-center"><a href="{{ URL::route('home') }}">{{ HTML::image('assets/img/Logo3D03-txt.png', 'Cdlgracia-logo3D', array('class' => 'img-responsive hidden-lg imgcenter espacio01 animated3 fadeInDown3')) }}</a></div>  
  			<div class="col-md-4"></div>			
  			<div class="col-md-9 ">{{ HTML::image('assets/img/leyen01.png', 'Cdlgracia-slogan', array('class' => 'img-responsive visible-lg animated1 bounceInLeft1')) }}</div>
  			<div class="col-md-3 ">
  				<h1 class="h1prin2 text-center">
  					<a href="{{ URL::route('home') }}" class="titulop visible-lg text-center animated2 bounceInRight2"><span class="span01">La</span><span class="span02">C</span><span class="span05 text-uppercase">omunidad</span> <span class="span03">de</span> <span class="span03">la</span><span class="span04">Gracia</span></a>
  				</h1>
  			</div>
  			<div class="col-md-12">{{ HTML::image('assets/img/leyen01.png', 'Cdlgracia-slogan', array('class' => 'img-responsive visible-md espacio02 animated1 bounceInLeft1')) }}</div>
		</div>
		@include('master.navegation')
		@yield('carrusel')
	</header>
	<!-- /header -->		
		<div class="row">
		  	<div class="col-md-8">
		  		@if(Session::has('global'))
			  		<div class="alert alert-warning">
				      	<button type="button" class="close" data-dismiss="alert">×</button>
						<p>{{ Session::get('global') }}</p>
				    </div>
			    @endif
			    @if(Session::has('create'))
				    <div class="alert alert-dismissable alert-info">
					  	<button type="button" class="close" data-dismiss="alert">×</button>
					  	<p><strong>Bien hecho! </strong> {{ Session::get('create') }}</p>
					</div>	
			    @endif
			    @if(Session::has('editar'))
			    	<div class="alert alert-dismissable alert-success">
					  	<button type="button" class="close" data-dismiss="alert">×</button>
					  	<p><strong>Bien hecho! </strong> {{ Session::get('editar') }}</p>
					</div>			  		
			    @endif
			    @if(Session::has('delete'))
			    	<div class="alert alert-dismissable alert-danger">
					  	<button type="button" class="close" data-dismiss="alert">×</button>
					  	<p>{{ Session::get('delete') }}</p>
					</div>
			    @endif
				@yield('content')
		  	</div><!--End col-md-8-->
		  	<div class="col-md-4">
		  		
		  		<aside>
		  		@include('master.navegation2')
		  			@yield('aside')		  			
	  				<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-film"></span> Último Video 
								@if(Auth::check() && (Auth::user()->id_rol == 0))
									<?php
								$videos = DB::table('predicas')->get();
								?>
		  						@foreach($videos as $video)
		  							@if($video->title == 'Video')
		  								<a href="{{ route('post.edit', $video->id) }}" class="btn btn-warning btn-sm">Editar</a>
		  							@endif
		  						@endforeach
								@endif
							</h3>

						</div>
						<div class="panel-body">
							<?php
							$videos = DB::table('predicas')->get();
							?>
	  						@foreach($videos as $video)
	  							@if($video->title == 'Video')
	  								{{ $video->content }}
	  							@endif
	  						@endforeach
	  					</div>
	  				</div>

	  				<!--Tag de predicadores-->
	  				<?php
	  					$predicas = DB::table('predicas')->get();
	  					$predicadores = DB::table('predicadores')->orderBy('nombre', 'asc')->get();
	  					$total = 0;
	  				?>
	  				<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><span class="glyphicon glyphicon-tags"></span> Predicadores</h3>
						</div>
						
						<div class="panel-body">
							@foreach($predicadores as $predicador)
								<a href="{{ URL::route('predicadores-show', $predicador->url) }}">
								<button class="btn btn-primary btn-xs" type="button">
								  {{ $predicador->nombre }} 
								  	<span class="badge">
								  		<?php
									  		$total = 0;
									  	?>
									  	@foreach($predicas as $predica)
								  			@if($predica->predicador == $predicador->id)
								  				<?php
								  					$total += 1;
								  				?>
								  			@endif
								  		@endforeach
								    	{{ $total }}
								  	</span>
								</button>
								</a>
							@endforeach		
	  					</div>
	  				</div>
	  				<!--Fin Tag de predicadores-->
		  			
		  			<div class="panel panel-success">
					  <div class="panel-heading">
					    <h3 class="panel-title"><span class="glyphicon glyphicon-bullhorn"></span> Anuncios</h3>
					  </div>
					  <div class="panel-body">
					    <?php 
					      $cont1 = 0;
					      $cont2 = 0;
					      $cont3 = 0;
					      $cont4 = 0;
					      $cont5 = 0;
					    ?>
					    @foreach($anuncios as $anuncio)
						<div id="animated-example" class="animated tada">
							<div class="list-group">
							  	<a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal{{ $cont1 += 1 }}">
								    <h4 class="list-group-item-heading">{{ $anuncio->nombre }}</h4>
								    <p class="list-group-item-text anuncio{{ $cont2 += 1 }}">Dia {{ date("d/m/Y", strtotime($anuncio->fecha)) }}</p>
								    <p class="list-group-item-text anuncio{{ $cont3 += 1 }}">Hora {{ date("H:i:s a", strtotime($anuncio->hora)) }}</p>
								    <p class="list-group-item-text anuncio{{ $cont4 += 1 }}">{{ substr($anuncio->content, 0, 50) }}...</p>
							  	</a>  
							</div>
						</div>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{ $cont5 += 1 }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								        <h4 class="modal-title" id="myModalLabel">{{ $anuncio->nombre }}</h4>
								    </div>
								    <div class="modal-body">
								        <blockquote>
										<dl class="dl-horizontal">
											  <dt>Nombre:</dt>
											  <dd>{{ $anuncio->nombre }}.</dd>
											  <dt>Fecha:</dt>
											  <dd>{{ date("d/m/Y", strtotime($anuncio->fecha)) }}.</dd>
											  <dt>Hora:</dt>
											  <dd>{{ date("H:i:s a", strtotime($anuncio->hora)) }}.</dd>
											  <dt>Contenido:</dt>
											  <dd>{{ $anuncio->content }}.</dd>
										</dl>
										<small><strong>Creado el 
											<cite title="Source Title">
												{{ date("d/m/Y H:i:s a", strtotime($anuncio->created_at)) }}
											</cite>
											 por 
											<cite>
												@foreach($users as $user)
										            @if($user->id == $anuncio->id_user)
										                {{ $user->username }}.
										            @endif
										        @endforeach
											</cite>
											</strong>
										</small>
										<small><strong>Ultima actualización el 
											<cite title="Source Title">
												{{ date("d/m/Y H:i:s a", strtotime($anuncio->updated_at)) }}
											</cite>
											 por 
											<cite>
												@foreach($users as $user)
										            @if($user->id == $anuncio->update_user)
										                {{ $user->username }}.
										            @endif
										        @endforeach
											</cite>
											</strong>
										</small>
										</blockquote>
								    </div>
								    <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>								     
								    </div>
						    	</div>
						  	</div>
						</div>
						<!--Fin modal-->
						<br>
						@endforeach
					  </div>
					</div>
					<!--Tag mas votados-->
					<!--
					<div class="panel panel-default">
  						<div class="panel-heading">
    						<h3 class="panel-title">Publicaciones Populares</h3>
  						</div>
  						<div class="panel-body">
  						<?php
  						 	$total = 0;
  						?>
  							@foreach($publicacion as $publica)
  								@foreach($votacion as $voto)
  									@if(($publica->id == $voto->id_post) && ($total != $voto->id_post))
  										<a href="{{ URL::route('predicas-show', $publica->url) }}" class="btn btn-default btn-xs">{{ $publica->title }}</a>							
	  									<?php
	  										$total = $voto->id_post 
	  									?>				
  									@endif
  								@endforeach
  							@endforeach
  						</div>
					</div>
					-->
					<!--Fin tag mas votados-->					
		  		</aside>
		  		<article>
		  			@yield('aside1')
		  		</article>
		  	</div><!--End col-md-4-->
		</div><!--End row-->

		
	</div><!--End Container-->
	<footer>
		<div class="well2">
			<div class="row">
			  	<div class="col-md-4 text-center text-primary">
			  	<h6>
		  			<a href="{{ URL::route('home') }}" title="">Inicio</a> |
		  			<a href="{{ URL::route('predicas-show', 'nosotros') }}" title="">Nosotros</a> | 
		  			<a href="{{ URL::route('predicas-show', 'ministerios') }}" title="">Ministerios</a> |	
		  			<a href="{{ URL::route('predicas-show', 'galeria') }}" title="">Galeria</a> |
		  			<a href="{{ URL::route('predicas-show', 'contacto') }}" title="">Contacto</a> |
		  			<a href="{{ URL::route('predicas-show', 'vision-2020') }}" title="">Visión 2020</a>
		  		</h6>
		  		<br>
		  		<p class="text-info">Nuestros Canales</p>
		  		<a href="http://www.facebook.com/CdlGracia" target="_blank" title="">{{ HTML::image('assets/img/facebook.png', 'Cdlgracia-facebook', array('class' => 'sociales', 'width' => '80')) }}</a>
		  		<a href="https://www.youtube.com/channel/UCMuhhfg4InG0Fi-oPvgRT3A" target="_blank" title="">{{ HTML::image('assets/img/youtube.png', 'Cdlgracia-youtube', array('class' => 'sociales', 'width' => '80')) }}</a>
		  		<a href="http://www.twitter.com/CdlGracia" target="_blank" title="">{{ HTML::image('assets/img/twitter.png', 'Cdlgracia-twitter', array('class' => 'sociales', 'width' => '80')) }}</a>
		  		<a href="https://plus.google.com/u/0/111775038431373780891/posts" target="_blank" title="">{{ HTML::image('assets/img/google+.png', 'Cdlgracia-google+', array('class' => 'sociales', 'width' => '80')) }}</a>	  		
			  	</div>
			  	<hr class="visible-xs">
			  	<div class="col-md-4 text-center text-primary">
			  		<h4><a href="{{ URL::route('predicas-show', 'ministerios') }}" title="">Ministerios de la Iglesia</a></h4>
			  		<p class="text-primary">Alabanza y Adoración</p>
			  		<p class="text-primary">Oración</p>
			  		<p class="text-primary">Evangelizmo</p>
			  		<p class="text-primary">Jovenes</p>
			  		<p class="text-primary">Pre-Adolecentes</p>
			  		<p class="text-primary">Escuela Dominical</p>
			  		<p class="text-primary">Maternal</p>
			  		<p class="text-primary">Protocolo</p>
			  	</div>
			  	<hr class="visible-xs">
			  	<div class="col-md-4 text-center text-primary">
			  		<p>Fundación La Comunidad de la Gracia</p>
			  		<p>J-29503016-9</p>
			  		<p>Salón de fiesta, C.C. La Villa, Urb. Montalban II.</p>
			  		<p><span class="glyphicon glyphicon-map-marker"></span> Caracas - Venezuela</p>
			  		<p class="text-info">Reuniones</span></p>
			  		<p>Domingos: 10:30 am.</p>				  		
			  	</div>
			  	<br>
			  	<hr class="hidden-lg">
			  	<div class="col-md-12 text-center">
					<p class="text-info">Copyright © {{ date('Y') }}, Iglesia La Comunidad de la Gracia.</p>
				</div>
			</div>			
		</div>
		<a class="go-top hidden-xs" href="#">Subir</a>			
		</footer>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-34129419-1', 'auto');
			ga('send', 'pageview');

		</script>
		
		<!--Disqus-->
		    <script type="text/javascript">
		    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		    var disqus_shortname = 'lacomunidaddelagracia'; // required: replace example with your forum shortname

		    /* * * DON'T EDIT BELOW THIS LINE * * */
		    (function () {
		        var s = document.createElement('script'); s.async = true;
		        s.type = 'text/javascript';
		        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		    }());
		    </script>
    
</body>
</html>


