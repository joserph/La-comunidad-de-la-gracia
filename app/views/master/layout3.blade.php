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
	{{ HTML::style('assets/css/reset.css') }}
	{{ HTML::style('assets/css/bootstrap.css') }}
	{{ HTML::style('assets/css/flatly-bootstrap.css', array('media' => 'screen')) }}	
    <!--Javascript-->
	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/menuresponsive.js') }}

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
			@include('master.navegation1')
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
		
	</div><!--End Container-->
	
</body>
</html>