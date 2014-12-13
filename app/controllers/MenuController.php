<?php

class MenuController extends \BaseController 
{

	public function index()
	{
        $menust = DB::table('menu')->orderBy('created_at', 'desc')->paginate(10);
        $menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $fechas = Mes::all();
        $predicas = Predica::all();
        $users = User::all();
		return View::make('menu.index',array(
            'menust' => $menust,
            'menus' => $menus,
            'padres' => $padres,
            'hijos' => $hijos,
            'fechas' => $fechas,
            'predicas' => $predicas,
            'users' => $users
        ));
	}


	public function create()
	{
		$menus = new Menu;
        $padres = Menu::all();
        $predicas = Predica::all();
      	return View::make('menu.form', array(
            'menus' => $menus, 
            'padres' => $padres,
            'predicas' => $predicas
        ));
	}


	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo agente
        $menus = new Menu;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($menus->isValid($data))
        {
            // Si la data es valida se la asignamos al agente
            $menus->fill($data);
            // Guardamos el agente
            $menus->save();
            // Y Devolvemos una redirección a la acción show para mostrar el agente
            return Redirect::route('menu.index', array($menus->id))
                    ->with('create', 'El menú ha sido creado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('menu.create')->withInput()->withErrors($menus->errors);
        }
	}


	public function show($id)
	{
		$menus = Menu::find($id);
        $users = User::all();
        $padres = Menu::all();
		if (is_null($menus))
		{
			App::abort(404);
		}

		return View::make('menu.show', array(
            'menus' => $menus,
            'users' => $users,
            'padres' => $padres
            )
        );
	}


	public function edit($id)
	{
        $padres = Menu::all();
		$menus = Menu::find($id);

		if (is_null($id))
		{
			App::abort(404);
		}

		return View::make('menu.edit', array(
            'menus' => $menus,
            'padres' => $padres
        ));
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $menus = Menu::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($menus))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($menus->isValid2($data))
        {
            // Si la data es valida se la asignamos al usuario
            $menus->fill($data);
            // Guardamos el usuario
            $menus->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('menu.index', array($menus->id))
                    ->with('editar', 'El menú ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('menu.edit', $menus->id)
            		->withInput()
            		->withErrors($menus->errors);
        }
	}


	public function destroy($id)
	{
		$menus = Menu::find($id);
        
        if (is_null ($menus))
        {
            App::abort(404);
        }
        
        $menus->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $menus->nombre . ' eliminado',
                'id'      => $menus->id
            ));
        }
        else
        {
            return Redirect::route('menu.index')
            		->with('delete', 'El menú ha sido eliminado correctamente.');
        }
	}


}
