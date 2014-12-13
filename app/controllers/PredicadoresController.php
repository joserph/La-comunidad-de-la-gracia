<?php

class PredicadoresController extends \BaseController {


	public function index()
	{
        $users = User::all();
		$predicadores = DB::table('predicadores')->orderBy('created_at', 'desc')->paginate(10);
		return View::make('predicadores.index', array('predicadores' => $predicadores, 'users' => $users));
	}


	public function create()
	{
		$predicadores = new Predicador;
      	return View::make('predicadores.form', array('predicadores' => $predicadores));
	}


	public function store()
	{
        // Creamos un nuevo objeto para nuestro nuevo agente
        $predicadores = new Predicador;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($predicadores->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $predicadores->fill($data);
            // Guardamos el agente
            $predicadores->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('predicadores.index', array($predicadores->id))
                    ->with('create', 'El predicador ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('predicadores.create')->withInput()->withErrors($predicadores->errors);
        }
	}


	public function show($id)
	{
		$predicadores = Predicador::find($id);

		if (is_null($predicadores))
		{
			App::abort(404);
		}

		return View::make('predicadores.show', array('predicadores', $predicadores));
	}


	public function edit($id)
	{
		$predicadores = Predicador::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('predicadores.form')->with('predicadores', $predicadores);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $predicadores = Predicador::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($predicadores))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($predicadores->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $predicadores->fill($data);
            // Guardamos el usuario
            $predicadores->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('predicadores.index', array($predicadores->id))
                    ->with('editar', 'El predicador ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('predicadores.edit', $predicadores->id)
            		->withInput()
            		->withErrors($predicadores->errors);
        }
	}


	public function destroy($id)
	{
		$predicadores = Predicador::find($id);
        
        if (is_null ($predicadores))
        {
            App::abort(404);
        }
        
        $predicadores->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $predicadores->name . ' eliminado',
                'id'      => $predicadores->id
            ));
        }
        else
        {
            return Redirect::route('predicadores.index')
            		->with('delete', 'El predicador ha sido eliminado correctamente.');
        } 
	}

}
