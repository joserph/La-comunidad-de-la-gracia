<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Galeria extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('nombre', 'ruta', 'exten', 'name', 'ubicacion', 'estado', 'tamano', 'id_user', 'dir');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'dir'      => 'required'
        );      
        
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
	protected $table = 'archivos';

	
}
