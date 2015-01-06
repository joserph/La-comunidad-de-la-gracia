<?php

class PredicasController extends \BaseController 
{

	public function index()
	{
		$user = User::all();
        $predicas = DB::table('predicas')
            ->where('tipo', '=', 'predica')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
		return View::make('predicas.index')->with('predicas', $predicas, 'user', $user);
	}


	public function create()
	{
		$users = User::all();
        $predicadores = Predicador::all();
        $fechas = Mes::all();
		$predica = new Predica;
        $padres = Menu::all();
      	return View::make('predicas.form', array(
            'predica' => $predica, 
            'users' => $users, 
            'fechas' => $fechas, 
            'predicadores' => $predicadores,
            'padres' => $padres
            ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $predica = new Predica;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($predica->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $predica->fill($data);
            // Guardamos el agente
            $predica->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('predicas-show', array($predica->url))
                    ->with('create', 'La predica ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('predicas.create')->withInput()->withErrors($predica->errors);
        }
	}


	public function show($id)
	{
        
	}


	public function edit($id)
	{
        $users = User::all();
        $fechas = Mes::all();
		$predica = Predica::find($id);
        $padres = Menu::all();
        $predicadores = Predicador::all();

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('predicas.edit', array(
            'predica' => $predica, 
            'users' => $users, 
            'fechas' => $fechas,
            'padres' => $padres,
            'predicadores' => $predicadores
            ));
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $predica = Predica::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($predica))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($predica->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $predica->fill($data);
            // Guardamos el usuario
            $predica->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('predicas-show', array($predica->url))
                    ->with('editar', 'La predica ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('predicas.edit', $predica->id)
            		->withInput()
            		->withErrors($predica->errors);
        }
	}


	public function destroy($id)
	{
		$predica = Predica::find($id);
        
        if (is_null ($predica))
        {
            App::abort(404);
        }
        
        $predica->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $predica->name . ' eliminado',
                'id'      => $predica->id
            ));
        }
        else
        {
            return Redirect::route('predicas.index')
            		->with('delete', 'La predica ha sido eliminado correctamente.');
        }  
	}


}
