@if(Auth::check())
<nav class="fuente espacio">
  <div class="navbar1 navbar-default1">
    <div class="navbar-header1">
      <button type="button" class="navbar-toggle1" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar1"></span>
        <span class="icon-bar1"></span>
        <span class="icon-bar1"></span>
      </button>
    </div>
      <div class="collapse1 navbar-collapse1" id="menu">
        <ul class="navbar-nav1">
          <li><a href="{{ URL::route('home') }}">Inicio</a></li>
            @foreach($menus as $menu)
                @if(($menu->estatus == "principal") || ($menu->estatus == "privado"))
                    @if($menu->cat == "fecha")
                        <li class="dropdown1"><a href="{{ URL::route('fechas-show', $menu->url) }}" class="dropdown-toggle1">{{ $menu->nombre }} <b class="caret1"></b></a>
                    @else 
                        <li><a href="{{ URL::route('predicas-show', $menu->url) }}" >{{ $menu->nombre }}</a>
                    @endif
                        <ul class="dropdown-menu1">
                          @foreach($padres as $padre)
                                @if(($padre->padre == $menu->id) && ($menu->tipo == "expandido") && ($padre->estatus != "principal") && ($padre->estatus != "privado"))
                                    @if(($padre->cat == "fecha") && ($padre->tipo == "expandido"))
                                        <li class="dropdown1">
                                          <a href="{{ URL::route('fechas-show', $padre->url) }}" class="dropdown-toggle1">{{ $padre->nombre }} <b class="caret1 right1"></b></a>
                                    @elseif(($padre->cat == "fecha") && ($padre->tipo == "normal")) 
                                        <li>
                                            <a href="{{ URL::route('fechas-show', $padre->url) }}">{{ $padre->nombre }}</a>
                                    @else 
                                        <li>
                                          <a href="{{ URL::route('predicas-show', $padre->url) }}">{{$padre->nombre}}</a>
                                    @endif
                                      <ul class="dropdown-menu1">
                                        @foreach($hijos as $hijo)
                                            @if(($hijo->padre == $padre->id) && ($padre->tipo == "expandido") && ($hijo->estatus != "principal") && ($hijo->estatus != "privado"))
                                                @if($hijo->cat == "fecha")
                                                    <li><a href="{{ URL::route('fechas-show', $hijo->url) }}">{{ $hijo->nombre }}</a></li>
                                                @else 
                                                    <li><a href="{{ URL::route('predicas-show', $hijo->url) }}">{{$hijo->nombre}}</a></li>
                                                @endif
                                            @endif  
                                        @endforeach
                                      </ul> 
                                    </li>
                                @endif 
                          @endforeach 
                        </ul>    
                    </li>
                @endif
            @endforeach
        </ul>
      </div>
  </div>
</nav>
@else
<nav class="fuente espacio">
  <div class="navbar1 navbar-default1">
    <div class="navbar-header1">
      <button type="button" class="navbar-toggle1" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar1"></span>
        <span class="icon-bar1"></span>
        <span class="icon-bar1"></span>
      </button>
    </div>
      <div class="collapse1 navbar-collapse1" id="menu">
        <ul class="navbar-nav1">
          <li><a href="{{ URL::route('home') }}">Inicio</a></li>
            @foreach($menus as $menu)
                @if($menu->estatus == "principal")
                    @if($menu->cat == "fecha")
                        <li class="dropdown1"><a href="{{ URL::route('fechas-show', $menu->url) }}" class="dropdown-toggle1">{{ $menu->nombre }} <b class="caret1"></b></a>
                    @else 
                        <li><a href="{{ URL::route('predicas-show', $menu->url) }}" >{{ $menu->nombre }}</a>
                    @endif
                        <ul class="dropdown-menu1">
                          @foreach($padres as $padre)
                                @if(($padre->padre == $menu->id) && ($menu->tipo == "expandido") && ($padre->estatus != "principal") && ($padre->estatus != "privado"))
                                    @if(($padre->cat == "fecha") && ($padre->tipo == "expandido"))
                                        <li class="dropdown1">
                                          <a href="{{ URL::route('fechas-show', $padre->url) }}" class="dropdown-toggle1">{{ $padre->nombre }} <b class="caret1 right1"></b></a>
                                    @elseif(($padre->cat == "fecha") && ($padre->tipo == "normal")) 
                                        <li>
                                            <a href="{{ URL::route('fechas-show', $padre->url) }}">{{ $padre->nombre }}</a>
                                    @else 
                                        <li>
                                          <a href="{{ URL::route('predicas-show', $padre->url) }}">{{$padre->nombre}}</a>
                                    @endif
                                      <ul class="dropdown-menu1">
                                        @foreach($hijos as $hijo)
                                            @if(($hijo->padre == $padre->id) && ($padre->tipo == "expandido") && ($hijo->estatus != "principal") && ($hijo->estatus != "privado"))
                                                @if($hijo->cat == "fecha")
                                                    <li><a href="{{ URL::route('fechas-show', $hijo->url) }}">{{ $hijo->nombre }}</a></li>
                                                @else 
                                                    <li><a href="{{ URL::route('predicas-show', $hijo->url) }}">{{$hijo->nombre}}</a></li>
                                                @endif
                                            @endif  
                                        @endforeach
                                      </ul> 
                                    </li>
                                @endif 
                          @endforeach 
                        </ul>    
                    </li>
                @endif
            @endforeach
        </ul>
      </div>
  </div>
</nav>   
@endif


