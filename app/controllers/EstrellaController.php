<?php

class EstrellaController extends \BaseController 
{

	public function getEstrella()
    {   
        $prome = 0;
        $total = DB::table('estrellas')->sum('voto');
        $numerov = DB::table('estrellas')->count();
        if($total > 0){
            $prome = $total/$numerov;
        }
        else{
            $prome = 0;
        }
        $promedio = number_format("$prome",2);     
        return View::make("estrella.home", array(
            'numerov' => $numerov,
            'promedio' => $promedio
            ));
    }


    public function postEstrella()
    {
        //comprobamos si es una petición ajax
        if(Request::ajax()){
            //validamos el formulario
            $registerData = array(
                "voto"      =>  Input::get("voto"),
                "id_user"   =>  Input::get("id_user"),
                "id_post"   =>  Input::get("id_post")
            );
                
            $rules = array(
                'voto'      => 'required',
            );
                
            $messages = array(
                'required'      => 'Debes seleccionar una opción para votar.',
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
                $voto      =  Input::get("voto");
                $id_user   =  Input::get("id_user");
                $id_post   =  Input::get("id_post");

                //creamos un nuevo usuario con los datos del formulario
                $content = new Estrella($registerData);
                $content->save(); 
                //si se realiza correctamente la inserción envíamos un mensaje
                //conforme se ha registrado correctamente
                if($content)
                {
                    $max = DB::table('estrellas')->max('id');
                    $estrellas = Estrella::all();
                    foreach($estrellas as $estrella){
                        if($estrella->id == $max){
                            $predica = $estrella->id_post;
                        }
                    }
                    $total = DB::table('estrellas')->where('id_post', '=', $predica)->sum('voto');
                    $numerov = DB::table('estrellas')->where('id_post', '=', $predica)->count();
                    if($total > 0){
                        $prome = $total/$numerov;
                    }
                    else{
                        $prome = 0;
                    }
                    $promedio = number_format("$prome",2);
                    return Response::json(array(
                        'success'       =>  true,
                        'message'       =>  "<h3>Gracias por votar</h3>",
                        'total'         =>  $total,
                        'numerov'       =>  $numerov,
                        'promedio'      =>  $promedio
                    ));
                }
            }
        }
    }
}
