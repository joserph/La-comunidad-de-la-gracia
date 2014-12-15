<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Estrella extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('voto', 'id_user', 'id_post');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'voto'      => 'required'
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
	protected $table = 'estrellas';

	
}
