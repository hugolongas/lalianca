<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['uses' => 'HomeController@Index', 'as' => 'home']);
Route::get('/activitats',['uses'=>'ActivitatController@Index','as' =>'activitats']);
Route::get('/activitats/?date={date}',['uses'=>'ActivitatController@Index','as' =>'activitats.date']);
Route::get('/activitats/calendar/{year}/{month}',['uses'=>'ActivitatController@ByDate','as' =>'activitats.calendar']);

Route::get('alianca',['uses'=>'HomeController@page','as'=>'alianca']);
Route::get('alianca/historia',['uses'=>'HomeController@page','as'=>'historia']);
Route::get('alianca/historia/arxiu',['uses'=>'HomeController@page','as'=>'arxiu']);
Route::get('alianca/historia/edifici',['uses'=>'HomeController@page','as'=>'edifici',]);

Route::get('/organitzacio',['uses'=>'HomeController@page','as'=>'organitzacio']);

Route::get('/mecenatge',['uses'=>'HomeController@page','as'=>'mecenatge']);

Route::get('/seccions',['uses'=>'HomeController@page','as'=>'seccions']);
Route::get('/serveis',['uses'=>'HomeController@serveis','as'=>'serveis']);
Route::get('/serveis/bar',['uses'=>'HomeController@page','as'=>'bar']);
Route::get('/serveis/padel',['uses'=>'HomeController@page','as'=>'padel']);
Route::get('/serveis/lloguer',['uses'=>'HomeController@page','as'=>'lloguer']);

Route::get('/activitat/{slug}',['uses'=>'ActivitatController@Show','as' =>'activitat']);

Route::get('/contact',['uses'=>'HomeController@socis','as'=>'contact']);

Route::get('/socis',['uses'=>'HomeController@socis','as'=>'socis']);
Route::get('/socis/inscripcio',['uses'=>'SociController@index','as'=>'socis.inscripcio']);
Route::post('/socis/create',['uses'=>'SociController@store','as'=>'socis.store']);