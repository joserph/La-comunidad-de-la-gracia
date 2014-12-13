<?php

class GaleriaController extends BaseController 
{
    public function getGaleria()
    {
        $dir = Dir::all();
        $photos = Archivo::all();
        $archivosdb = DB::table('archivos')->where('estado', '>', 0)->get();
        $menus = DB::table('menu')->orderBy('peso', 'asc')->get();
        $padres = DB::table('menu')->orderBy('peso', 'asc')->get();
        $hijos = DB::table('menu')->orderBy('peso', 'asc')->get();
        $anuncios = DB::table('anuncios')->orderBy('created_at', 'desc')->get();
        return View::make('galerias.index', array(
            'dir' => $dir,
            'photos' => $photos,
            'menus' => $menus,
            'padres' => $padres,
            'hijos' => $hijos,
            'anuncios' => $anuncios
        ));
    }

    public function postCreateDir()
    {
        $carpeta = new Dir;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        $dir = Input::get('dir');

        $path = 'assets/img/'.$dir;
        
        $carpeta->fill($data);
        $carpeta->nombre = $dir;
        $carpeta->save();
        // Y Devolvemos una redirección a la acción show para mostrar el agente
        return Redirect::route('upload')->with('dir', $dir);
        
    
          
    }

    public function getUpload()
    {
        $dirname = DB::table('dir')->select('nombre')->max('nombre');
        return View::make('galerias.galeria', array('dirname' => $dirname));
    }

    public function postUpload()
    {
        $dirname = DB::table('dir')->select('nombre')->max('id');
        $fileInput = Input::file('file');
        $dir = Input::get('dir');
        
        if(Input::hasFile('file'))
        {   

            $name = str_random(30);
            $dire = 'assets/img/'.$dirname;
            $exten = $fileInput->getClientOriginalExtension();
            $size = $fileInput->getSize()/1024;
            $id = Auth::user()->id;

            $file = new Archivo;
            $file->nombre = $name;
            $file->ruta = $dire;
            $file->tipo = $exten;
            $file->tamano = $size;
            $file->id_user = $id;
            $file->name = $dire.'/'.$name.'.'.$exten;
            $file->estado = $dirname;

            if($fileInput->move($dire, $name.'.'.$fileInput->getClientOriginalExtension()))
            {
                $file->save();
            }
        }
        
        
    }

    public function getDeletePhoto($id)
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
                return Redirect::route('galeria')
                        ->with('delete', 'el file ha sido eliminado correctamente.');
            }  
        }
        
    }

}
