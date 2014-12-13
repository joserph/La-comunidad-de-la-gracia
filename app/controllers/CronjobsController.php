<?php

class CronjobsController extends \BaseController 
{

	public function index()
	{
        $cronjobs = Cronjob::all();
        $users = User::all();
        $biblia = Biblia::all();
		return View::make('cronjobs.index',array(
            'cronjobs' => $cronjobs,
            'users' => $users,
            'biblia' => $biblia
        ));
	}


	public function create()
	{
		$cronjobs = new Cronjob;
        $users = User::all();
        $versiculo = DB::table('biblia')->orderBy(DB::raw('RAND()'))->get();
      	return View::make('cronjobs.form', array(
            'cronjobs' => $cronjobs, 
            'users' => $users,
            'versiculo' => $versiculo
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $cronjobs = new Cronjob;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($cronjobs->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $cronjobs->fill($data);
            // Guardamos el agente
            $cronjobs->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('cronjobs.index', array($cronjobs->id))
                    ->with('create', 'La cron job ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('cronjobs.create')->withInput()->withErrors($cronjobs->errors);
        }
	}


	public function show($id)
	{
		$cronjobs = Cronjob::find($id);
        $users = User::all();
		if (is_null($cronjobs))
		{
			App::abort(404);
		}

		return View::make('cronjobs.show', array(
            'cronjobs' => $cronjobs,
            'users' => $users
            )
        );
	}


	public function edit($id)
	{
		$cronjobs = Cronjob::find($id);
        $versiculo = DB::table('biblia')->orderBy(DB::raw('RAND()'))->get();
        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('cronjobs.form', array('versiculo' => $versiculo))
            ->with('cronjobs', $cronjobs);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $cronjobs = Cronjob::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($cronjobs))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($cronjobs->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cronjobs->fill($data);
            // Guardamos el usuario
            $cronjobs->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('cronjobs.index', array($cronjobs->id))
                    ->with('editar', 'La cron job ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('cronjobs.edit', $cronjobs->id)
            		->withInput()
            		->withErrors($cronjobs->errors);
        }
	}


	public function destroy($id)
	{
		$cronjobs = Cronjob::find($id);
        
        if (is_null ($cronjobs))
        {
            App::abort(404);
        }
        
        $cronjobs->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $cronjobs->nombre . ' eliminado',
                'id'      => $cronjobs->id
            ));
        }
        else
        {
            return Redirect::route('cronjobs.index')
            		->with('delete', 'La cron job ha sido eliminado correctamente.');
        }
	}


}
