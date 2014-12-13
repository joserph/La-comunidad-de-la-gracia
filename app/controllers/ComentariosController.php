<?php

class ComentariosController extends \BaseController 
{

	public function getPosts()
    {
        $articulos = Predica::all();
        $users = User::all();
        $comentarios = DB::table('comentarios')->paginate(10);
        return View::make("comentarios.index", array(
            'comentarios' => $comentarios,
            'users' => $users,
            'articulos' => $articulos
            ));
    }


    public function postPosts()
    {
        //comprobamos si es una petición ajax
        if(Request::ajax()){
            //validamos el formulario
            $registerData = array(
                "nombre"        =>   Input::get("nombre"),
                "comentario"    =>   Input::get("comentario"),
                "id_user"       =>   Input::get("id_user"),
                "id_articulo"   =>   Input::get("id_articulo")
            );
                
            $rules = array(
                'nombre'      => 'required|min:5|max:50',
                'comentario'  => 'required|min:6|max:1000',
            );
                
            $messages = array(
                'required'      => 'El campo :attribute es obligatorio.',
                'min'           => 'El campo :attribute no puede tener menos de :min carácteres.',
                'email'         => 'El campo :attribute debe ser un email válido.',
                'max'           => 'El campo :attribute no puede tener más de :max carácteres.',
                'unique'        => 'El email ingresado ya está registrado en la base de datos.',
                'confirmed'     => 'Los passwords no coinciden.'
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
                //creamos un nuevo usuario con los datos del formulario
                $content = new Comentario($registerData);
                $content->save(); 
                //si se realiza correctamente la inserción envíamos un mensaje
                //conforme se ha registrado correctamente
                if($content)
                {
                    $posts = DB::table('comentarios')->get();
                    return Response::json(array(
                        'success'       =>  true,
                        'message'       =>  "<h3>Comentario creado correctamente.</h3>",
                        'posts'         =>  $posts
                    ));
                }
            }
        }

    }

    public function show($id)
    {
        $comentarios = Comentario::find($id);
        $users = User::all();
        if (is_null($comentarios))
        {
            App::abort(404);
        }

        return View::make('comentarios.show', array(
            'comentarios' => $comentarios,
            'users' => $users
            )
        );
    }


    public function edit($id)
    {
        $comentarios = Comentario::find($id);

        if (is_null($id))
        {
            App::abort(404);
        }

        return View::make('comentarios.edit')->with('comentarios', $comentarios);
    }


    public function update($id)
    {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $comentarios = Comentario::find($id);
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($comentarios))
        {
            App::abort(404);
        }
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        // Revisamos si la data es válido
        if ($comentarios->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $comentarios->fill($data);
            // Guardamos el usuario
            $comentarios->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('comentarios', array($comentarios->id))
                    ->with('editar', 'El comentario ha sido actualizado correctamente.');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('comentarios.edit', $comentarios->id)
                    ->withInput()
                    ->withErrors($comentarios->errors);
        }
    }


    public function destroy($id)
    {
        $comentarios = Comentario::find($id);
        
        if (is_null ($comentarios))
        {
            App::abort(404);
        }
        
        $comentarios->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Agente ' . $comentarios->nombre . ' eliminado',
                'id'      => $comentarios->id
            ));
        }
        else
        {
            return Redirect::route('comentarios')
                    ->with('delete', 'El comentario ha sido eliminado correctamente.');
        }
    }


}
