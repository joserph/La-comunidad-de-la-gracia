<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Predicador extends Eloquent implements UserInterface, RemindableInterface 
{  
    public function predicas()
    {
        return $this->hasMany('Predica', 'id_user');
    }

	public $errors;

	protected $fillable = array('nombre', 'url', 'id_user', 'tipo', 'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'    => 'required|max:50|unique:predicadores',
            'url'       => 'required'
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
	protected $table = 'predicadores';

	
}
