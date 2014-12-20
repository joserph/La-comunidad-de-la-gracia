<?php

class HomeController extends BaseController {


	public function home()
	{
		$users = User::all();
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
		if(isset($_GET['buscar']))
		{
			$buscar = Input::get('buscar');
			$predicas = DB::table('predicas')
				->orderBy('created_at', 'desc')
				->where('title', 'LIKE', '%'.$buscar.'%')
				->orwhere('content', 'LIKE', '%'.$buscar.'%')
				->paginate(10);
		}
		else
		{
			$predicas = DB::table('predicas')->orderBy('created_at', 'desc')->where('estatus', '=', 'publicado')->paginate(10);
		}
		
		$menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $anuncios = DB::table('anuncios')->orderBy('created_at', 'desc')->get();
        $cronjobs = Cronjob::all();
        $biblia = Biblia::all(); 
        $sliders = Slider::all();
        $destinoPath = 'assets/img/articulo';
        $archivos = File::files($destinoPath);
        $comentarios = Comentario::all();
        $predicadores = Predicador::all();
        $votacion = Estrella::all(); 
        $publicacion = Predica::all();
		//$posts = Post::all();
		return View::make('home', array(
			'posts' => $posts,
			'predicas' => $predicas,
			'users' => $users,
			'menus' => $menus,
			'padres' => $padres,
			'hijos' => $hijos,
			'anuncios' => $anuncios,
			'cronjobs' => $cronjobs,
			'biblia' => $biblia,
			'sliders' => $sliders,
			'archivos' => $archivos,
			'comentarios' => $comentarios,
			'predicadores' => $predicadores,
			'votacion' => $votacion,
			'publicacion' => $publicacion
			)
		);
	}

	public function getShowFechas($url)
	{
		$predicas = DB::table('predicas')->orderBy('created_at', 'desc')->get();
		$users = User::all();
		$fechas = Mes::where('url', '=', $url)->first();
		$menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $anuncios = DB::table('anuncios')->orderBy('created_at', 'desc')->get();
        $predicadores = Predicador::all();
        $votacion = Estrella::all(); 
        $publicacion = Predica::all(); 
	    return View::make('fechas.show', array(
	    	'fechas' => $fechas,
	    	'predicas' => $predicas,
	    	'users' => $users,
	    	'menus' => $menus,
			'padres' => $padres,
			'hijos' => $hijos,
			'anuncios' => $anuncios,
			'predicadores' => $predicadores,
			'votacion' => $votacion,
			'publicacion' => $publicacion
	    	)
	    );
	}

	public function getShowPredicador($url)
	{
		$predicas = DB::table('predicas')->orderBy('created_at', 'desc')->get();
		$users = User::all();
		$predicadores = Predicador::where('url', '=', $url)->first();
		$menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $anuncios = DB::table('anuncios')->orderBy('created_at', 'desc')->get();
        $votacion = Estrella::all();  
        $publicacion = Predica::all(); 
	    return View::make('predicadores.show', array(
	    	'predicadores' => $predicadores,
	    	'predicas' => $predicas,
	    	'users' => $users,
	    	'menus' => $menus,
			'padres' => $padres,
			'hijos' => $hijos,
			'anuncios' => $anuncios,
			'votacion' => $votacion,
			'publicacion' => $publicacion
	    	)
	    );
	}

	public function getShowPredicas($url)
	{
		$users = User::all();
		$fechas = Mes::all();
		$predicadores = Predicador::all();
		$predica = Predica::where('url', '=', $url)->first();
		$menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $destinoPath = 'assets/img/articulo';
        $archivos = File::files($destinoPath); 
        $anuncios = DB::table('anuncios')->orderBy('created_at', 'desc')->get();
        $comentarios = Comentario::all();
        $prome = 0;
        $total = DB::table('estrellas')->where('id_post', '=', $predica->id)->sum('voto');
        $numerov = DB::table('estrellas')->where('id_post', '=', $predica->id)->count();
        if($total > 0){
            $prome = $total/$numerov;
        }
        else{
            $prome = 0;
        }       
        $promedio = number_format("$prome",2);
        $votacion = Estrella::all();  
        $publicacion = Predica::all(); 
	    return View::make('predicas.show', array(
	    	'predica' => $predica, 
	    	'users' => $users,
	    	'fechas' => $fechas,
	    	'predicadores' => $predicadores,
	    	'menus' => $menus,
			'padres' => $padres,
			'hijos' => $hijos,
			'archivos' => $archivos,
			'anuncios' => $anuncios,
			'comentarios' => $comentarios,
			'numerov' => $numerov,
			'promedio' => $promedio,
			'votacion' => $votacion,
			'publicacion' => $publicacion
	    	)
	    );
	}

	public function getContenido()
	{
		$predicas = DB::table('predicas')->where('tipo', '=', 'predica')->count();
		$posts = DB::table('predicas')->where('tipo', '=', 'post')->count();
		$mes = DB::table('mes')->count();
		$predicadores = DB::table('predicadores')->count();
		$anuncios = DB::table('anuncios')->count();
		$biblia = DB::table('biblia')->count();
		$cronjobs = DB::table('cronjobs')->count();
		$sliders = DB::table('slider')->count();
		$comentarios = DB::table('comentarios')->count();
		$oraciones = DB::table('oraciones')->count();
		return View::make('contenido', array(
			'predicas' => $predicas,
			'posts' => $posts,
			'mes' => $mes,
			'predicadores' => $predicadores,
			'anuncios' => $anuncios,
			'biblia' => $biblia,
			'cronjobs' => $cronjobs,
			'sliders' => $sliders,
			'comentarios' => $comentarios,
			'oraciones' => $oraciones
			)
		);
	}

	public function getShowAnuncios($id)
	{
		$anuncios = Anuncio::where('id', '=', $id)->first();
        $users = User::all();
		if (is_null($anuncios))
		{
			App::abort(404);
		}

		return View::make('anuncios.show', array(
            'anuncios' => $anuncios,
            'users' => $users
            )
        );
	}

	public function getShowBiblia($id)
	{	
		$biblia = Biblia::where('id', '=', $id)->first();
        $users = User::all();
		if (is_null($biblia))
		{
			App::abort(404);
		}

		return View::make('biblia.show', array(
            'biblia' => $biblia,
            'users' => $users
            )
        );
	}

	public function getShowAdmin($username)
	{
		$user = User::where('username', '=', $username);

		if($user->count())
		{
			$user = $user->first();

			return View::make('admin.show')
					->with('user', $user);
		}

		return App::abort(404); 
	}

	public function getCreateOracion()
	{
		$oraciones = new Oracion;
      	return View::make('oracion.form', array(
            'oraciones' => $oraciones
        ));
	}

	public function postCreateOracion()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $oraciones = new Oracion;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($oraciones->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $oraciones->fill($data);
            // Guardamos el agente
            $oraciones->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('home', array($oraciones->id))
                    ->with('create', 'La petición ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('home')->withInput()->withErrors($oraciones->errors);
        }
	}
}
