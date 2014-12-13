<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Biblia extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('libro', 'capitulo', 'versiculo', 'update_user', 'content', 'id_user', 'cont');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'libro'     => 'required',
            'capitulo'  => 'required',
            'versiculo' => 'required',
            'content'   => 'required|unique:biblia'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['content'] .= ',content,' . $this->id;
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
	protected $table = 'biblia';

	
}
