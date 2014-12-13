<?php

class SubirController extends BaseController {

    public function getSubir()
    {
        $destinoPath = 'assets/img';
        $archivos = File::files($destinoPath);
        $estado = false;
        $archivosdb = Archivo::all();  
        return View::make('subir.index', array(
            'archivos' => $archivos,
            'archivosdb' => $archivosdb
            ))->with('estado', $estado);
    }

    public function postSubir()
    {
        $fileInput = Input::file('file');
        if(Input::hasFile('file'))
        {
            $name = str_random(30);
            $dir = 'assets/img';
            $exten = $fileInput->getClientOriginalExtension();
            $size = $fileInput->getSize()/1024;
            $id = Auth::user()->id;

            $file = new Archivo;
            $file->nombre = $name;
            $file->ruta = $dir;
            $file->tipo = $exten;
            $file->tamano = $size;
            $file->id_user = $id;
            $file->name = $dir.'/'.$name.'.'.$exten;

            if($fileInput->move($dir, $name.'.'.$fileInput->getClientOriginalExtension()))
            {
                $file->save();
            }
        }
        /*--Primer metodo solo subir la imagen--
        $file = Input::file('file');
        $name = str_random(30);
        $dir = 'assets/img';
        $subir = $file->move($dir, $name.'.'.$file->getClientOriginalExtension());
        --fin Primer metodo solo subir la imagen--*/
    }

    public function getGalery()
    {
        $destinoPath = 'assets/img';
        $archivos = File::files($destinoPath);
        $archivosdb = DB::table('archivos')->where('estado', '=', 0)->get(); 
        return View::make('subir.galery', array(
            'archivos' => $archivos,
            'archivosdb' => $archivosdb
            ));
    }

    public function deleteFile($id)
    {
        $file = Archivo::find($id);
        if(unlink($file->name))
        {
            $file->delete();

            if (Request::ajax())
            {
                return Response::json(array (
                    'success' => true,
                    'msg'     => 'Agente ' . $file->name . ' eliminado',
                    'id'      => $file->id
                ));
            }
            else
            {
                return Redirect::route('galery')
                        ->with('global', 'el file ha sido eliminado correctamente.');
            }  
        }
        else{
            return View::make('subir.galery');
        }
    }

    public function postArticulo()
    {
        $file = Input::file('file');

        $data = Input::all();

        $f_name = Hash::make($file->getClientOriginalName());

        $f_ruta = 'assets/img';

        $f_exten = $file->getClientOriginalExtension();

        $subir = $file->move($f_ruta, $f_name.'.'.$file->getClientOriginalExtension());

        if($subir)
        {
            $articulo = new Predica;
            if ($articulo->isValid2($data))
            {
                $articulo->f_name = $f_name;
                $articulo->f_ruta = $destinoPath;
                $articulo->f_exten = $exten;
                $articulo->fill($data);
                $articulo->save();  

                return Redirect::route('post.index', array($post->id))
                    ->with('global', 'El posts ha sido creado correctamente.');             
            }
            else
            {
                // En caso de error regresa a la acción create con los datos y los errores encontrados
                return Redirect::route('post.create')->withInput()->withErrors($post->errors);
            }
            
        }
    }

}
