<?php

class AdminController extends \BaseController {


	public function index()
	{
		$users = User::paginate(10);
		return View::make('admin.users', array('users' => $users));
	}


	public function create()
	{
		
	}


	public function store()
	{
        
	}


	public function show($id)
	{
		
	}


	public function edit($id)
	{
		$user = User::find($id);

        if(is_null($id))
        {
            return Redirect::route('home')
            ->with('global', 'No es tu profile.');
        }

        return View::make('admin.form', array('user' => $user));
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($user->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin-show', array($user->username));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.edit', $user->id);
        }
	}


	public function destroy($id)
	{
		$user = User::find($id);
        
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        $user->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $user->nombre . ' eliminado',
                'id'      => $user->id
            ));
        }
        else
        {
            return Redirect::route('admin')
                    ->with('delete', 'El anuncio ha sido eliminado correctamente.');
        }
	}

}
