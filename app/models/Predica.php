<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Predica extends Eloquent implements UserInterface, RemindableInterface 
{
	public $errors;

	protected $fillable = array(
        'title', 
        'url', 
        'predicador', 
        'content', 
        'estatus', 
        'id_user', 
        'mes', 
        'anio', 
        'tipo',
        'update_user',
        'audio',
        'f_name', 
        'f_ruta', 
        'f_exten',
        'fecha',
        'comentario'
        );

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'title'     => 'required|max:100|unique:predicas',
            'url'       => 'required',
            'estatus'   => 'required',
            'audio'     => 'required',
            'fecha'     => 'required',
            'comentario'=> 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['title'] .= ',title,' . $this->id;
        }        
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function isValid2($data)
    {
        $rules = array(
            'title'     => 'required|max:60|unique:predicas',
            'url'       => 'required',
            'content'   => 'required',
            'estatus'   => 'required',
            'comentario'=> 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
            $rules['title'] .= ',title,' . $this->id;
        }        
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'predicas';

	
}
