<?php

/*
|----------------------------4nombre----------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| post,get,put,delete
*/




Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function(){
    return "Hola este es un mensaje";
    
});

Route::get('nombre/{nombre}', function($nombre){
    return "Mi nombre es: " .$nombre;
    
});

Route::get('edad/{edad}', function($edad){
    return "Mi edad es: " .$edad;
    
});

Route::get('nombre2/{nombre?}', function($nombre = 'Natalia' ){
    return "Mi nombre es: " .$nombre;
    
});

Route::get('controlador','PruebaController@index');
Route::get('name/{nombre}','PruebaController@nombre');

/*Rest full controller*/
Route::resource('movie','MovieController');




Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');



Auth::routes();

Route::group([ 'middleware' => 'auth'], function(){

Route::resource('usuario', 'UserController');
Route::resource('usuarioEvento', 'UserEventController');
Route::resource('asistentesEvento', 'EventAttendeesController');
Route::resource('itinerarios', 'ItinerariesController');
Route::resource('ingresoEvento', 'IngresoEventoController');
Route::resource('sugerencias', 'SugerenciasController');
Route::resource('checkinEvento', 'CheckinController');

Route::get('/config/page/excel', 'IngresoEventoController@excel');

Route::get('/home', 'HomeController@index')->name('home');

});

