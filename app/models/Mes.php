<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Mes extends Eloquent implements UserInterface, RemindableInterface 
{
    public function predicas()
    {
        return $this->hasMany('Predica', 'id_user');
    }
    
	public $errors;

	protected $fillable = array('fecha', 'url', 'tipo', 'id_user', 'update_user');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'fecha'     => 'required|max:50|unique:mes',
            'url'       => 'required',
            'tipo'  	=> 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['fecha'] .= ',fecha,' . $this->id;
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
	protected $table = 'mes';

	
}
