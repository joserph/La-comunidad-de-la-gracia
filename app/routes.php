<?php
Route::group(array('prefix' => LaravelLocalization::setLocale()), function()
    {
		Route::get('/', array(
			'as' => 'home',
			'uses' => 'HomeController@home'
		));
	}
);

Route::group(array('before' => 'auth'), function()
{
	/* CSRF proteccion group */

	Route::group(array('before' => 'csrf'), function()
	{
		/* Change password (POST) */

		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	/* Change password (GET) */

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/* Sign out (GET) */

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

	Route::group(array('before' => 'admon'), function()
	{
		Route::resource('admin', 'AdminController', 
			array('except' => array('show')));

		Route::get('admin/{username}', array(
		'as' => 'admin-show',
		'uses' => 'HomeController@getShowAdmin'
		));

		Route::post('create/dir', array(
			'as' => 'create-dir',
			'uses' => 'GaleriaController@postCreateDir'
		));

		Route::get('upload', array(
			'as' => 'upload',
			'uses' => 'GaleriaController@getUpload'
		));

		Route::post('upload', array(
			'as' => 'upload',
			'uses' => 'GaleriaController@postUpload'
		));

		Route::get('galeria/{id}', array(
			'as' => 'delete-photo',
			'uses' => 'GaleriaController@getDeletePhoto'
		));

		Route::resource('comentarios', 'ComentariosController', 
			array('except' => array('store', 'create', 'index')));

		Route::resource('oracion', 'OracionController', 
			array('except' => array('store', 'create')));

	});

	Route::group(array('before' => 'editor'), function()
	{
		Route::resource('menu', 'MenuController');
		
		Route::resource('post', 'PostsController', 
			array('except' => array('show')));

		Route::resource('predicas', 'PredicasController',
			array('except' => array('show')));

		Route::resource('fechas', 'MesController',
			array('except' => array('show')));

		Route::resource('predicadores', 'PredicadoresController',
			array('except' => array('show')));

		Route::get('adminc/contenido', array(
			'as' => 'adminc-contenido',
			'uses' => 'HomeController@getContenido'
		));

		Route::resource('anuncios', 'AnunciosController',
			array('except' => array('show')));

		Route::resource('biblia', 'BibliaController',
			array('except' => array('show')));
		
		Route::resource('cronjobs', 'CronjobsController');


		Route::resource('slider', 'SliderController');

	});
	
	Route::resource('user', 'ProfileController');

	Route::get('comentarios', array(
		'as' => 'comentarios',
		'uses' => 'HomeController@getComent'
	));

	Route::get('comentarios', 'ComentariosController@getPosts');

	Route::post('comentarios', 'ComentariosController@postPosts');
	
});



Route::get('galeria', array(
		'as' => 'galeria',
		'uses' => 'GaleriaController@getGaleria'
	));

Route::post('oracion', 'OracionController@postOracion');

/*******************/
Route::get('anuncios/{id}', array(
		'as' => 'anuncios-show',
		'uses' => 'HomeController@getShowAnuncios'
	));

Route::get('biblia/{id}', array(
		'as' => 'biblia-show',
		'uses' => 'HomeController@getShowBiblia'
	));
/***********CORREGIDO 21/08/2014***************/
/*
Route::get('/{url}', function($url)
{
	$users = User::all();
	$fechas = Mes::all();
	$predicadores = Predicador::all();
	$predica = Predica::where('url', '=', $url)->first();
    return View::make('predicas.show', array(
    	'predica' => $predica, 
    	'users' => $users,
    	'fechas' => $fechas,
    	'predicadores' => $predicadores
    	)
    );
});*/

Route::get('/{url}', array(
		'as' => 'predicas-show',
		'uses' => 'HomeController@getShowPredicas'
	));

/*
Route::get('fechas/{url}', function($url)
{
	$predicas = Predica::all();
	$users = User::all();
	$fechas = Mes::where('url', '=', $url)->first();
    return View::make('fechas.show', array(
    	'fechas' => $fechas,
    	'predicas' => $predicas,
    	'users' => $users
    	)
    );
});*/

Route::get('fechas/{url}', array(
		'as' => 'fechas-show',
		'uses' => 'HomeController@getShowFechas'
	));


/***************/

Route::get('predicadores/{url}', array(
		'as' => 'predicadores-show',
		'uses' => 'HomeController@getShowPredicador'
	));

/*************CORREGIDO 21/08/2014**************/////
/*
Route::get('predicadores/{url}', function($url)
{
	$predicas = Predica::all();
	$users = User::all();
	$predicadores = Predicador::where('url', '=', $url)->first();
    return View::make('predicadores.show', array(
    	'predicadores' => $predicadores,
    	'predicas' => $predicas,
    	'users' => $users
    	)
    );
}); */
Route::get('estrella', 'EstrellaController@getEstrella');	

Route::post('estrella', 'EstrellaController@postEstrella');	
/* Autenticacion */
Route::group(array('before' => 'guest'), function()
{
	/* CSRF proteccion */
	Route::group(array('before' => 'csrf'), function()
	{
		/* Crear Cuenta (POST) */

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/* Sign in (POST)*/

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/* Forgot password (POST) */

		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));

	});

	/* Forgot password (GET) */

	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

	/* Recuperar code (GET) */

	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

	/* Sign in (GET)*/

	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	/* Crear cuenta (GET) */

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));


	
});