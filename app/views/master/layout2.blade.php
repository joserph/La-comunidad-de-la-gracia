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
	{{ HTML::style('assets/css/sliding.css') }}<!--Luego colocar solo en el home-->
	{{ HTML::style('assets/css/reset.css') }}
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/flatly-bootstrap.css', array('media' => 'screen')) }}
	<!--Javascript-->
	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/menuresponsive.js') }}
	{{ HTML::script('assets/js/bootstrap.js') }}

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
		</header><!-- /header -->
		<div class="row">
	  		@if(Session::has('global'))
		  		<div class="alert alert-warning">
			      	<button type="button" class="close" data-dismiss="alert">&times;</button>
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
		</div>
		<br>
		
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
</body>
</html>


