<?php

class BibliaController extends \BaseController 
{

	public function index()
	{
        $biblia = DB::table('biblia')->orderBy('created_at', 'desc')->paginate(100);
        $users = User::all();
		return View::make('biblia.index',array(
            'biblia' => $biblia,
            'users' => $users
        ));
	}


	public function create()
	{
		$biblia = new Biblia;
        $users = User::all();
      	return View::make('biblia.form', array(
            'biblia' => $biblia, 
            'users' => $users
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $biblia = new Biblia;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($biblia->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $biblia->fill($data);
            // Guardamos el agente
            $biblia->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('biblia.index', array($biblia->id))
                    ->with('create', 'El versículo ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('biblia.create')->withInput()->withErrors($biblia->errors);
        }
	}


	public function show($id)
	{
		
	}


	public function edit($id)
	{
		$biblia = Biblia::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('biblia.form')->with('biblia', $biblia);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $biblia = Biblia::find($id);
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($biblia))
        {
            App::abort(404);
        }
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        // Revisamos si la data es válido
        if ($biblia->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $biblia->fill($data);
            // Guardamos el usuario
            $biblia->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('biblia.index', array($biblia->id))
                    ->with('editar', 'El versículo ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('biblia.edit', $biblia->id)
            		->withInput()
            		->withErrors($biblia->errors);
        }
	}


	public function destroy($id)
	{
		$biblia = Biblia::find($id);
        
        if (is_null ($biblia))
        {
            App::abort(404);
        }
        
        $biblia->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $biblia->nombre . ' eliminado',
                'id'      => $biblia->id
            ));
        }
        else
        {
            return Redirect::route('biblia.index')
            		->with('delete', 'El versículo ha sido eliminado correctamente.');
        }
	}


}
