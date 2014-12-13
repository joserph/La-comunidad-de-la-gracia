<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Anuncio extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('nombre', 'id_user', 'estatus', 'update_user', 'content', 'hora', 'fecha');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'nombre'    => 'required',
            'content'   => 'required',
            'estatus'   => 'required',
            'fecha'     => 'required',
            'hora'      => 'required'
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
	protected $table = 'anuncios';

	
}
