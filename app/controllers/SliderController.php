<?php

class SliderController extends \BaseController 
{

	public function index()
	{
        $sliders = Slider::all();
        $users = User::all();
        $destinoPath = 'assets/img/articulo';
        $archivos = File::files($destinoPath); 
		return View::make('slider.index',array(
            'sliders' => $sliders,
            'users' => $users, 
            'archivos' => $archivos
        ));
	}


	public function create()
	{
		$sliders = new Slider;
        $users = User::all();
      	return View::make('slider.form', array(
            'sliders' => $sliders, 
            'users' => $users
        ));
	}


	public function store()
	{
		$file = Input::file('file');

        $data = Input::all();

        $sliders = new Slider;

        if ($sliders->isValid($data))
        {
            $f_name = str_random(30);
            $f_ruta = 'assets/img/articulo';
            $f_exten = $file->getClientOriginalExtension();
            $nombre = $f_name.'.'.$f_exten;
            $subir = $file->move($f_ruta, $nombre);

            $sliders->f_nombre = $f_name;
            $sliders->f_ruta = $f_ruta.'/'.$f_name.'.'.$f_exten;
            $sliders->f_exten = $f_exten;
            $sliders->fill($data);
            $sliders->save(); 

            return Redirect::route('slider.index', array($sliders->id))
                ->with('create', 'El slider ha sido creado correctamente.');             
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('slider.create')
                ->withInput()
                ->withErrors($sliders->errors);
        }
        
	}


	public function show($id)
	{
	    $users = User::all();
        $sliders = slider::find($id);
        $destinoPath = 'assets/img/articulo';
        $archivos = File::files($destinoPath); 
        return View::make('slider.show', array(
            'users' => $users,
            'sliders' => $sliders,
            'archivos' => $archivos
            )
        );	
	}


	public function edit($id)
	{
		$sliders = Slider::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('slider.form')->with('sliders', $sliders);
	}


	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $sliders = Slider::find($id);

        $file = Input::file('file');

        if($file)
        {
            $f_name = str_random(30);
            
            $f_ruta = 'assets/img/articulo';

            $f_exten = $file->getClientOriginalExtension();
            $nombre = $f_name.'.'.$f_exten;
            $subir = $file->move($f_ruta, $nombre);
                // Si el usuario no existe entonces lanzamos un error 404 :(
            if (is_null ($sliders))
            {
                App::abort(404);
            }
            // Obtenemos la data enviada por el usuario
            $data = Input::all();
            
            if ($sliders->isValid($data))
            {

                $sliders->f_nombre = $f_name;
                $sliders->f_ruta = $f_ruta.'/'.$f_name.'.'.$f_exten;
                $sliders->f_exten = $f_exten;
                // Si la data es valida se la asignamos al usuario
                $sliders->fill($data);
                // Guardamos el usuario
                $sliders->save();
                // Y Devolvemos una redirección a la acción show para mostrar el usuario
                return Redirect::route('slider.index', array($sliders->id))
                        ->with('editar', 'El slider ha sido actualizado correctamente.');
            }
            else
            {
                // En caso de error regresa a la acción edit con los datos y los errores encontrados
                return Redirect::route('slider.edit', $sliders->id)
                        ->withInput()
                        ->withErrors($sliders->errors);
            }
        }
        else
        {
            // Si el usuario no existe entonces lanzamos un error 404 :(
            if (is_null ($sliders))
            {
                App::abort(404);
            }
            // Obtenemos la data enviada por el usuario
            $data = Input::all();
            
            if ($sliders->isValid($data))
            {
                // Si la data es valida se la asignamos al usuario
                $sliders->fill($data);
                // Guardamos el usuario
                $sliders->save();
                // Y Devolvemos una redirección a la acción show para mostrar el usuario
                return Redirect::route('slider.index', array($sliders->id))
                        ->with('editar', 'El slider ha sido actualizado correctamente.');
            }
            else
            {
                // En caso de error regresa a la acción edit con los datos y los errores encontrados
                return Redirect::route('slider.edit', $sliders->id)
                        ->withInput()
                        ->withErrors($sliders->errors);
            }
        }
	}


	public function destroy($id)
	{
		$sliders = Slider::find($id);
        
        if (is_null ($sliders))
        {
            App::abort(404);
        }
        
        $sliders->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $sliders->nombre . ' eliminado',
                'id'      => $sliders->id
            ));
        }
        else
        {
            return Redirect::route('slider.index')
            		->with('delete', 'El slider ha sido eliminado correctamente.');
        }
	}


}
