<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Biblia extends Eloquent implements UserInterface, RemindableInterface 
{   

	public $errors;

	protected $fillable = array('libro', 'capitulo', 'versiculo', 'texto', 'update_user', 'content', 'id_user', 'cont');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'libro'     => 'required',
            'capitulo'  => 'required',
            'versiculo' => 'required',
            'texto'     => 'unique:biblia',
            'content'   => 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['texto'] .= ',texto,' . $this->id;
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
