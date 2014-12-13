<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Menu extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('nombre', 'id_user', 'url', 'estatus', 'peso', 'tipo', 'id_expan', 'padre', 'cat', 'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'    => 'required|unique:menu',
            'url'       => 'required',
            'estatus'   => 'required',
            'peso'      => 'required',
            'tipo'      => 'required',
            'padre'     => 'required',
            'cat'       => 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['nombre'] .= ',nombre,' . $this->id;
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
            'nombre'    => 'required|unique:menu',
            'url'       => 'required',
            'estatus'   => 'required',
            'peso'      => 'required',
            'tipo'      => 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
            $rules['nombre'] .= ',nombre,' . $this->id;
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
	protected $table = 'menu';

	
}
