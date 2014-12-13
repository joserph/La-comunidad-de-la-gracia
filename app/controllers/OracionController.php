<?php

class OracionController extends \BaseController 
{

	public function index()
    {
        $oraciones = DB::table('oraciones')->paginate(10);
        return View::make("oracion.index", array(
            'oraciones' => $oraciones
            ));
    }


    public function postOracion()
    {
        //comprobamos si es una petición ajax
        if(Request::ajax()){
            //validamos el formulario
            $registerData = array(
                "nombre"        =>   Input::get("nombre"),
                "email"         =>   Input::get("email"),
                "peticion"      =>   Input::get("peticion")
            );
                
            $rules = array(
                'nombre'    => 'required|min:5|max:50',
                'email'     => 'email',
                'peticion'  => 'required|min:6|max:1000',
                'captcha'   => 'required|captcha'
            );
                
            $messages = array(
                'required'      => 'El campo :attribute es obligatorio.',
                'min'           => 'El campo :attribute no puede tener menos de :min carácteres.',
                'email'         => 'El campo :attribute debe ser un email válido.',
                'max'           => 'El campo :attribute no puede tener más de :max carácteres.',
                'unique'        => 'El email ingresado ya está registrado en la base de datos.',
                'confirmed'     => 'Los passwords no coinciden.',
                'captcha'       => 'El captcha es incorrecto.'
            );
                
            $validation = Validator::make(Input::all(), $rules, $messages);
            //si la validación falla redirigimos al formulario de registro con los errores   
            if ($validation->fails())
            {
                //como ha fallado el formulario, devolvemos los datos en formato json
                //esta es la forma de hacerlo en laravel, o una de ellas
                return Response::json(array(
                    'success' => false,
                    'errors' => $validation->getMessageBag()->toArray()
                )); 
                //en otro caso ingresamos al usuario en la tabla usuarios
            }else{
                $nombre     = Input::get("nombre");
                $email      = Input::get("email");
                $peticion   = Input::get("peticion");
                //creamos un nuevo usuario con los datos del formulario
                $content = new Oracion($registerData);
                $content->save(); 
                //si se realiza correctamente la inserción envíamos un mensaje
                //conforme se ha registrado correctamente
                if($content)
                {
                    // Envio de email
                    Mail::send('emails.oracion.peticion', array('link' => URL::route('home'), 'nombre' => $nombre, 'peticion' => $peticion ), function($message) use ($content)
                        {
                            $message->to('cdlgracia1@gmail.com', 'Lider de Oración')->subject('Petición de Oración');
                        });

                    $posts = DB::table('oraciones')->get();
                    return Response::json(array(
                        'success'       =>  true,
                        'message'       =>  "Tu petición se ha guardado correctamente",
                        'posts'         =>  $posts
                    ));
                }
            }
        }

    }


	public function show($id)
	{
		$oraciones = Oracion::find($id);
		if (is_null($oraciones))
		{
			App::abort(404);
		}

		return View::make('oracion.show', array(
            'oraciones' => $oraciones
            )
        );
	}


	public function edit($id)
	{
		$oraciones = Oracion::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('oracion.edit')->with('oraciones', $oraciones);
	}


	public function update($id)
	{
		
	}


	public function destroy($id)
	{
		$oraciones = Oracion::find($id);
        
        if (is_null ($oraciones))
        {
            App::abort(404);
        }
        
        $oraciones->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $oraciones->nombre . ' eliminado',
                'id'      => $oraciones->id
            ));
        }
        else
        {
            return Redirect::route('oracion.index')
            		->with('delete', 'La petición de oración ha sido eliminado correctamente.');
        }
	}


}
