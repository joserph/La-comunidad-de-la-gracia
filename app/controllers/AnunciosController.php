<?php

class AnunciosController extends \BaseController 
{

	public function index()
	{
        $anuncios = Anuncio::paginate(10);
        $users = User::all();
		return View::make('anuncios.index',array(
            'anuncios' => $anuncios,
            'users' => $users
        ));
	}


	public function create()
	{
		$anuncios = new Anuncio;
        $users = User::all();
      	return View::make('anuncios.form', array(
            'anuncios' => $anuncios, 
            'users' => $users
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $anuncios = new Anuncio;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($anuncios->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $anuncios->fill($data);
            // Guardamos el agente
            $anuncios->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('anuncios.index', array($anuncios->id))
                    ->with('create', 'El anuncio ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('anuncios.create')->withInput()->withErrors($anuncios->errors);
        }
	}


	public function show($id)
	{
		$anuncios = Anuncio::find($id);
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


	public function edit($id)
	{
		$anuncios = Anuncio::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('anuncios.form')->with('anuncios', $anuncios);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $anuncios = Anuncio::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($anuncios))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($anuncios->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $anuncios->fill($data);
            // Guardamos el usuario
            $anuncios->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('anuncios.index', array($anuncios->id))
                    ->with('editar', 'El anuncio ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('anuncios.edit', $anuncios->id)
            		->withInput()
            		->withErrors($anuncios->errors);
        }
	}


	public function destroy($id)
	{
		$anuncios = Anuncio::find($id);
        
        if (is_null ($anuncios))
        {
            App::abort(404);
        }
        
        $anuncios->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $anuncios->nombre . ' eliminado',
                'id'      => $anuncios->id
            ));
        }
        else
        {
            return Redirect::route('anuncios.index')
            		->with('delete', 'El anuncio ha sido eliminado correctamente.');
        }
	}


}
