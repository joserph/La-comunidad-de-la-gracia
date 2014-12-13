<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Slider extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('titulo', 'ruta', 'content', 'f_nombre', 'f_ruta', 'f_exten', 'id_user', 'update_user', 'tipo');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'titulo'    => 'required',
            'ruta'      => 'required',
            'content'   => 'required'
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
	protected $table = 'slider';

	
}
