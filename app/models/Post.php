<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Post extends Eloquent implements UserInterface, RemindableInterface 
{
	public $errors;

	protected $fillable = array('title', 'url', 'content', 'id_user', 'comentario');

	use UserTrait, RemindableTrait;

	public function isValid($data)
    {
        $rules = array(
            'title'     => 'required|max:60|unique:posts',
            'url'       => 'required',
            'content'  	=> 'required',
            'comentario'   => 'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['title'] .= ',title,' . $this->id;
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
	protected $table = 'posts';

	
}
