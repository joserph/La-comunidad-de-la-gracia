<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cronjob extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('tipo', 'id_user', 'dia', 'update_user', 'id_tarea');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'tipo'      => 'required',
            'dia'       => 'required|unique:cronjobs',
            'id_tarea'  => 'required'
        ); 

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
            $rules['dia'] .= ',dia,' . $this->id;
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
	protected $table = 'cronjobs';

	
}
