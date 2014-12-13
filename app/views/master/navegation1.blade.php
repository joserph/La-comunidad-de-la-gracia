<nav class="fuente espacio"><!--nav-->
	<div class="navbar1 navbar-default1"><!--div.navbar1-->
		<div class="navbar-header1">
		    <button type="button" class="navbar-toggle1" data-toggle="collapse" data-target="#menu">
		        <span class="icon-bar1"></span>
		        <span class="icon-bar1"></span>
		        <span class="icon-bar1"></span>
		    </button>
	    </div>
	    <div class="collapse1 navbar-collapse1" id="menu"><!--div.navbar collapse1-->
	    	<ul class="nav1 navbar-nav1"> <!--ul.nav1-->
	    		<li><a href="{{ URL::route('home') }}">Inicio</a></li><!--home-->   
	      		@if(Auth::check() && (Auth::user()->id_rol == 2))
		        
		        <li>
                    <a href="{{ route('user.show', Auth::user()->username) }}"><span class="glyphicon glyphicon-user"></span> Ver perfil</a>
                 </li>
	            <li>
	              	<a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
	            </li>
	            <li>
	              	<a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
	            </li>

	      		@elseif(Auth::check() && (Auth::user()->id_rol == 1))
	      		<li class="dropdown1">
			        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-cog"></span> Administración <b class="caret1"></b></a>
			        <ul class="dropdown-menu1">
			            <li>
			              	<a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a>
			            </li>
			            <li>
			              	{{ HTML::link('menu', 'Configuracion de Menú') }}
			            </li>
			        </ul>
		        </li>
	          	<li>
                    <a href="{{ route('user.show', Auth::user()->username) }}"><span class="glyphicon glyphicon-user"></span> Ver perfil</a>
                </li>
	            <li>
	              	<a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
	            </li>
	            <li>
	              	<a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
	            </li>
	       
	      		@elseif(Auth::check() && (Auth::user()->id_rol == 0))
	      		<li class="dropdown1">
			        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-cog"></span> Administración <b class="caret1"></b></a>
			        <ul class="dropdown-menu1">
			            <li>
			              	<a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a>
			            </li>
			            <li>
			              	{{ HTML::link('admin', 'Administración de Usuarios') }}
			            </li>
			            <li>
			              	{{ HTML::link('menu', 'Configuración de Menú') }}
			            </li>
			            <li>
			              	<a href="{{ URL::route('galeria') }}">Configuración de Galeria</a>
			            </li>
			        </ul>
		        </li>
		        <li>
                    <a href="{{ route('user.show', Auth::user()->username) }}"><span class="glyphicon glyphicon-user"></span> Ver perfil</a>
                </li>
	            <li>
	              	<a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
	            </li>
	            <li>
	              	<a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
	            </li>

	      		@else
		        
	            <li>
	              	<a href="{{ URL::route('account-sign-in') }}"><span class="glyphicon glyphicon-user"></span> Iniciar sesión</a></li>
	            <li>
	              	<a href="{{ URL::route('account-create') }}">Regístrate</a></li>
	            <li>
	              	<a href="{{ URL::route('account-forgot-password') }}">Recuparar contraseña</a></li>
	      		@endif
	  		</ul><!--Fin ul.nav1-->
	    </div><!--Fin div.navbar collapse1-->
	</div><!--Fin div.navbar1-->
</nav><!--fin nav-->