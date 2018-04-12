<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();
Route::get('auth/login', function () {
    return view('auth.login');
});
 Route::get('auth/login', [
		'uses' => 'Auth\AuthController@getLogin',
		'as'   => 'login'
	]);
 Route::post('auth/logout', [
		'uses' => 'Auth\AuthController@getLogout',
		'as'   => 'logout'
	]);
    //Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    //Route::post('auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
 //Route::get('/administrar', 'HomeController@index')->name('home');
 Route::get('administrar', [
		'uses' => 'HomeController@index',
		'as'   => 'home'
	]);
 //Route::get('/administrar/home', 'HomeController@index')->name('home');
 Route::get('administrar/home', [
		'uses' => 'HomeController@index',
		'as'   => 'home'
	]);
   
     Route::resource('categoriaimagen', 'configurar\Categoria_imagenController');
    Route::get('categoriaimagen/{id}/destroy', [
		'uses' => 'configurar\Categoria_imagenController@destroy',
		'as'   => 'categoriaimagen.destroy'
	]);
    Route::resource('categoriaproducto', 'configurar\Categoria_productoController');
    Route::get('categoriaproducto/{id}/destroy', [
		'uses' => 'configurar\Categoria_productoController@destroy',
		'as'   => 'categoriaproducto.destroy'
	]);
    Route::resource('categoriaservicio', 'configurar\Categoria_servicioController');
    Route::get('categoriaservicio/{id}/destroy', [
		'uses' => 'configurar\Categoria_servicioController@destroy',
		'as'   => 'categoriaservicio.destroy'
	]);
    Route::resource('categoriavideo', 'configurar\Categoria_videoController');
    Route::get('categoriavideo/{id}/destroy', [
		'uses' => 'configurar\Categoria_videoController@destroy',
		'as'   => 'categoriavideo.destroy'
	]);
    Route::resource('categoriadocumento', 'configurar\Categoria_DocumentoController');
    Route::get('categoriadocumento/{id}/destroy', [
		'uses' => 'configurar\Categoria_DocumentoController@destroy',
		'as'   => 'categoriadocumento.destroy'
	]);
    Route::resource('tipoproducto', 'configurar\Tipo_ProductoController');
    Route::get('tipoproducto/{id}/destroy', [
		'uses' => 'configurar\Tipo_ProductoController@destroy',
		'as'   => 'tipoproducto.destroy'
	]);
    Route::resource('documento', 'Registrar\DocumentoController');
    Route::get('documento/{id}/destroy', [
		'uses' => 'Registrar\DocumentoController@destroy',
		'as'   => 'documento.destroy'
	]);
    Route::resource('producto', 'Registrar\ProductoController');
    Route::get('producto/{id}/destroy', [
		'uses' => 'Registrar\ProductoController@destroy',
		'as'   => 'producto.destroy'
	]);
    Route::resource('servicio', 'Registrar\ServicioController');
    Route::get('servicio/{id}/destroy', [
		'uses' => 'Registrar\ServicioController@destroy',
		'as'   => 'servicio.destroy'
	]);
    Route::resource('galeriab', 'Registrar\GaleriaController');
    Route::get('galeriab/{id}/destroy', [
		'uses' => 'Registrar\GaleriaController@destroy',
		'as'   => 'galeriab.destroy'
	]);
   Route::get('cargatipoproductos','Registrar\ProductoController@cargatipoproductos');
   
   Route::resource('imagenes','ImagenesController');
   Route::get('imagenes/index/{categoria}/{tipo}', [
		'uses' => 'ImagenesController@index',
		'as'   => 'imagenes.index'
	]);
  Route::get('imagenes/create/{categoria}/{tipo}', [
		'uses' => 'ImagenesController@create',
		'as'   => 'imagenes.create'
	]); 
  Route::get('imagenes/show/{categoria}/{tipo}/{id}', [
		'uses' => 'ImagenesController@show',
		'as'   => 'imagenes.show'
	]); 
  Route::get('imagenes/edit/{categoria}/{tipo}/{id}', [
		'uses' => 'ImagenesController@edit',
		'as'   => 'imagenes.edit'
	]); 
Route::get('imagenes/destroy/{id}', [
		'uses' => 'ImagenesController@destroy',
		'as'   => 'imagenes.destroy'
	]);
Route::get('imagenes/principal/{id}', [
		'uses' => 'ImagenesController@principal',
		'as'   => 'imagenes.principal'
	]);
Route::get('videosb/index/{categoria}/{tipo}', [
		'uses' => 'Registrar\VideoController@index',
		'as'   => 'videosb.index'
	]);
Route::get('videosb/create/{categoria}/{tipo}', [
		'uses' => 'Registrar\VideoController@create',
		'as'   => 'videosb.create'
	]); 
Route::get('videosb/{id}/destroy', [
		'uses' => 'Registrar\VideoController@destroy',
		'as'   => 'videosb.destroy'
	]);
Route::get('videosb/principal/{id}', [
		'uses' => 'Registrar\VideoController@principal',
		'as'   => 'videosb.principal'
	]);
Route::get('videosb/show/{categoria}/{tipo}/{id}', [
		'uses' => 'Registrar\VideoController@show',
		'as'   => 'videosb.show'
	]); 
Route::put('videosb/actualizar/{id}',[
      'uses' => 'Registrar\VideoController@actualizar',
      'as'   => 'videosb.actualizar']);
Route::get('videosb/editar/{categoria}/{tipo}/{id}', [
		'uses' => 'Registrar\VideoController@editar',
		'as'   => 'videosb.editar'
	]);
Route::resource('videosb', 'Registrar\VideoController');
Route::resource('archivo','Registrar\ArchivoController');
Route::get('archivo/index/{iddocumento}', [
		'uses' => 'Registrar\ArchivoController@index',
		'as'   => 'archivo.index'
	]);
Route::get('archivo/create/{iddocumento}', [
		'uses' => 'Registrar\ArchivoController@create',
		'as'   => 'archivo.create'
	]); 
Route::get('archivo/destroy/{id}', [
		'uses' => 'Registrar\ArchivoController@destroy',
		'as'   => 'archivo.destroy'
	]);
Route::resource('empresa', 'configurar\EmpresaController');
Route::get('empresa/{id}/destroy', [
		'uses' => 'configurar\EmpresaController@destroy',
		'as'   => 'empresa.destroy'
	]);
Route::get('usuarios/{id}/destroy', [
		'uses' => 'configurar\UsersController@destroy',
		'as'   => 'usuarios.destroy'
	]);
Route::get('usuarios/cambiar/{valor}', [
		'uses' => 'configurar\UsersController@cambiar',
		'as'   => 'usuarios.cambiar'
	]);
Route::put('usuarios/update_password/{id}', [
		'uses' => 'configurar\UsersController@update_password',
		'as'   => 'usuarios.update_password'
	]);
Route::resource('usuarios', 'configurar\UsersController');
});
// FIN RUTAS BACKEND
//////////////////////////
// RUTAS FRONTEND
//////////
Route::get('/', [
      'as'=>'frontend.construccion',
      'uses'=>'FrontendController@construccion' 
      ]);
Route::get('index', [
      'as'=>'frontend.index',
      'uses'=>'FrontendController@index' 
      ]);
Route::get('/nosotros', [
      'as'=>'frontend.nosotros',
      'uses'=>'FrontendController@nosotros' 
      ]);
Route::get('servicios', [
      'as'=>'frontend.servicios',
      'uses'=>'FrontendController@servicios' 
      ]);
Route::get('servicios_detail/{categoriaid}/{id}', [
      'as'=>'frontend.servicios_detail',
      'uses'=>'FrontendController@servicios_detail' 
      ]);
//Route::resourse('producto', 'FrontendController');
Route::get('productos', [
      'as'=>'frontend.productos',
      'uses'=>'FrontendController@productos' 
      ]);
Route::get('productos_detail/{id}', [
      'as'=>'frontend.productos_detail',
      'uses'=>'FrontendController@productos_detail' 
      ]);
Route::get('leyes', [
      'as'=>'frontend.leyes',
      'uses'=>'FrontendController@leyes' 
      ]);
Route::get('leyesF/{id}', [
      'as'=>'frontend.leyesF',
      'uses'=>'FrontendController@leyesF' 
      ]);
Route::get('documentDetail/{id}', [
      'as'=>'frontend.documentDetail',
      'uses'=>'FrontendController@documentDetail' 
      ]);
Route::get('galeriaFront', [
      'as'=>'frontend.galeriaFront',
      'uses'=>'FrontendController@galeriaFront' 
      ]);
Route::get('galeria_detail/{id_categoria}/{id_galeria}', [
      'as'=>'frontend.galeria_detail',
      'uses'=>'FrontendController@galeria_detail' 
      ]);
Route::get('contacto', [
      'as'=>'frontend.contacto',
      'uses'=>'FrontendController@contacto' 
      ]);
Route::get('pruebas', [
      'as'=>'frontend.pruebas',
      'uses'=>'FrontendController@pruebas' 
      ]);