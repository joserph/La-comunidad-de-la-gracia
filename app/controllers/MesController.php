<?php

class MesController extends \BaseController {


	public function index()
	{
        $users = User::all();
		$fechas = DB::table('mes')->orderBy('created_at', 'desc')->paginate(25);
		return View::make('fechas.index', array('fechas' => $fechas, 'users' => $users));
	}


	public function create()
	{
        $users = User::all();
		$fechas = new Predica;
      	return View::make('fechas.form', array('fechas' => $fechas, 'users' => $users));
	}


	public function store()
	{
        // Creamos un nuevo objeto para nuestro nuevo agente
        $fechas = new Mes;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($fechas->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $fechas->fill($data);
            // Guardamos el agente
            $fechas->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('fechas.index', array($fechas->id))
                    ->with('create', 'La fecha ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('fechas.create')->withInput()->withErrors($fechas->errors);
        }
	}


	public function show($id)
	{
		
	}


	public function edit($id)
	{
		$fechas = Mes::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('fechas.form')->with('fechas', $fechas);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $fechas = Mes::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($fechas))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($fechas->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $fechas->fill($data);
            // Guardamos el usuario
            $fechas->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('fechas.index', array($fechas->id))
                    ->with('editar', 'La fecha ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('fechas.edit', $fechas->id)
            		->withInput()
            		->withErrors($fechas->errors);
        }
	}


	public function destroy($id)
	{
		$fechas = Mes::find($id);
        
        if (is_null ($fechas))
        {
            App::abort(404);
        }
        
        $fechas->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $fechas->name . ' eliminado',
                'id'      => $fechas->id
            ));
        }
        else
        {
            return Redirect::route('fechas.index')
            		->with('delete', 'La fecha ha sido eliminado correctamente.');
        }  
	}

}
