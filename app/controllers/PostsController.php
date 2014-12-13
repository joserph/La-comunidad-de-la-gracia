<?php

class PostsController extends \BaseController 
{

	public function index()
	{
		$user = User::all();
        $posts = DB::table('predicas')
            ->where('tipo', '=', 'post')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
		return View::make('post.index')->with('posts', $posts, 'user', $user);
	}


	public function create()
	{
		$users = User::all();
		$post = new Predica;
      	return View::make('post.form', array('post' => $post, 'users' => $users));
	}


	public function store()
	{
        $file = Input::file('file');
        $data = Input::all();

        $articulo = new Predica;
        
        if ($articulo->isValid2($data))
        {
            $f_name = str_random(30);
            $f_ruta = 'assets/img/articulo';
            $f_exten = Input::file('file')->getClientOriginalExtension();
            $nombre = $f_name.'.'.$f_exten;
            $subir = $file->move($f_ruta, $nombre);

            $articulo->f_name = $f_name;
            $articulo->f_ruta = $f_ruta.'/'.$f_name.'.'.$f_exten;
            $articulo->f_exten = $f_exten;
            $articulo->fill($data);
            $articulo->save();  

            return Redirect::route('post.index', array($articulo->id))
                ->with('create', 'El posts ha sido creado correctamente.');             
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('post.create')->withInput()->withErrors($articulo->errors);
        }
	}


	public function show($id)
	{
		
	}


	public function edit($id)
	{
		$post = Predica::find($id);

		if (is_null($id))
		{
			App::abort(404);
		}

		return View::make('post.edit')->with('post', $post);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $post = Predica::find($id);

        $file = Input::file('file');

        if($file)
        {
            $f_name = str_random(30);            
            $f_ruta = 'assets/img/articulo';
            $f_exten = $file->getClientOriginalExtension();
            $nombre = $f_name.'.'.$f_exten;
            $subir = $file->move($f_ruta, $nombre);

                // Si el usuario no existe entonces lanzamos un error 404 :(
            if (is_null ($post))
            {
                App::abort(404);
            }
            
            // Obtenemos la data enviada por el usuario
            $data = Input::all();
            
            
            if ($post->isValid2($data))
            {

                $post->f_name = $f_name;
                $post->f_ruta = $f_ruta.'/'.$f_name.'.'.$f_exten;
                $post->f_exten = $f_exten;

                // Si la data es valida se la asignamos al usuario
                $post->fill($data);
                // Guardamos el usuario
                $post->save();

                
                // Y Devolvemos una redirección a la acción show para mostrar el usuario
                return Redirect::route('post.index', array($post->id))
                        ->with('global', 'El posts ha sido actualizado correctamente.');
            }
            else
            {
                // En caso de error regresa a la acción edit con los datos y los errores encontrados
                return Redirect::route('post.edit', $post->id)
                        ->withInput()
                        ->withErrors($post->errors);
            }
        }
        else
        {
            // Si el usuario no existe entonces lanzamos un error 404 :(
            if (is_null ($post))
            {
                App::abort(404);
            }
            
            // Obtenemos la data enviada por el usuario
            $data = Input::all();
            
            
            if ($post->isValid2($data))
            {

                

                // Si la data es valida se la asignamos al usuario
                $post->fill($data);
                // Guardamos el usuario
                $post->save();

                
                // Y Devolvemos una redirección a la acción show para mostrar el usuario
                return Redirect::route('post.index', array($post->id))
                        ->with('global', 'El posts ha sido actualizado correctamente.');
            }
            else
            {
                // En caso de error regresa a la acción edit con los datos y los errores encontrados
                return Redirect::route('post.edit', $post->id)
                        ->withInput()
                        ->withErrors($post->errors);
            }
        }
  
	}


	public function destroy($id)
	{
		$post = Predica::find($id);
        
        if (is_null ($post))
        {
            App::abort(404);
        }
        
        $post->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $post->name . ' eliminado',
                'id'      => $post->id
            ));
        }
        else
        {
            return Redirect::route('post.index')
            		->with('delete', 'El posts ha sido eliminado correctamente.');
        }  
	}


}
