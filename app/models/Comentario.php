<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comentario extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('nombre', 'id_user', 'id_articulo', 'comentario');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'    => 'required|min:5|max:50',
            'comentario'   => 'required|min:6|max:1000'
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
	protected $table = 'comentarios';

	
}
