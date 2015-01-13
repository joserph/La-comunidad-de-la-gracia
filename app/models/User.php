<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface 
{

	public function posts()
    {
        return $this->hasMany('Post', 'id_user');
    }

    public function predicas()
    {
        return $this->hasMany('Predica', 'id_user');
    }

    public function mes()
    {
        return $this->hasMany('Mes', 'id_user');
    }

    public function predicadores()
    {
        return $this->hasMany('Predicador', 'id_user');
    }

	protected $fillable = array(
        'email', 
        'username', 
        'password', 
        'password_temp', 
        'code', 
        'active', 
        'id_rol', 
        'nombre',
        'ubicacion',
        'f_nombre',
        'f_ruta',
        'f_exten',
        'sexo'
    );

	use UserTrait, RemindableTrait;


	public function isValid($data)
    {
        $rules = array(
            'email' 	=>	'required|max:50|email|unique:users',
			'username' 	=> 	'required|max:10|min:4',
			'id_rol'	=>	'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
			$rules['email'] .= ',email,' . $this->id;
        }        
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function isValid2($data)
    {
        $rules = array(
            'email'     =>  'required|max:50|email|unique:users',
            'username'  =>  'required|max:10|min:4',
            'sexo'      =>  'required'
        );

        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el rif del Agente actual
            $rules['email'] .= ',email,' . $this->id;
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
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getAuthPassword()
	{
		return $this->password;
	}

}
