<!--Nav de Admin y Editores-->
<nav class="fuente espacio">
<div class="navbar1 navbar-default1">
  <ul class="nav1 navbar-nav1">    
    @if(Auth::check() && (Auth::user()->id_rol == 2))
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <b class="caret1"></b></a>
        <ul class="dropdown-menu1">
          <li>
            <a href="{{ route('user.show', Auth::user()->username) }}">Ver perfil</a>
          </li>
          <li>
            <a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
          </li>
          <li>
            <a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
          </li>
        </ul>
      </li>
    @elseif(Auth::check() && (Auth::user()->id_rol == 1))
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <b class="caret1"></b></a>
        <ul class="dropdown-menu1">
          <li>
            <a href="{{ route('user.show', Auth::user()->username) }}">Ver perfil</a>
          </li>
          <li>
            <a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
          </li>
          <li>
            <a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
          </li>
        </ul>
      </li>
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"> <span class="glyphicon glyphicon-cog"></span> Administración <b class="caret1"></b></a>
        <ul class="dropdown-menu1">
          <li>
            <a href="{{ URL::route('adminc-contenido') }}">Administrador de Contenido</a>
          </li>
          <li>
            {{ HTML::link('menu', 'Configuración de Menú') }}
          </li>
        </ul>
      </li>
    @elseif(Auth::check() && (Auth::user()->id_rol == 0))
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <b class="caret1"></b></a>
        <ul class="dropdown-menu1">
          <li>
            <a href="{{ route('user.show', Auth::user()->username) }}">Ver perfil</a>
          </li>
          <li>
            <a href="{{ URL::route('account-sign-out') }}">Cerrar sesión</a>
          </li>
          <li>
            <a href="{{ URL::route('account-change-password') }}">Cambiar contraseña</a>
          </li>
        </ul>
      </li>
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"> <span class="glyphicon glyphicon-cog"></span> Administración <b class="caret1"></b></a>
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
    @else
      <li class="dropdown1">
        <a href="#" class="dropdown-toggle1"><span class="glyphicon glyphicon-user"></span> Usuario <b class="caret1"></b></a>
        <ul class="dropdown-menu1">
          <li>
            <a href="{{ URL::route('account-sign-in') }}">Iniciar sesión</a></li>
          <li>
            <a href="{{ URL::route('account-create') }}">Regístrate</a></li>
          <li>
            <a href="{{ URL::route('account-forgot-password') }}">Recuparar contraseña</a></li>
        </ul>
      </li>
    @endif
  </ul>
</div>   
</nav>