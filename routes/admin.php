
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
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', ['uses' => 'AdminController@Index', 'as' => 'admin.home']);   
    Route::get('/activitats',['uses'=>'ActivitatController@adminIndex','as'=>'admin.activitats']);
    Route::get('/activitats/crear',['uses'=>'ActivitatController@create','as'=>'admin.activitats.create']);
    Route::post('/activitats/guardar', ['uses' => 'ActivitatController@Store', 'as' => 'admin.activitats.store']);    
    Route::get('/activitats/editar/{activitat}', ['uses' => 'ActivitatController@Edit', 'as' => 'admin.activitats.edit']);
    Route::put('/activitats/editar/{activitat}', ['uses' => 'ActivitatController@Update', 'as' => 'admin.activitats.update']);
    Route::post('/activitats/eliminar/{id}', ['uses' => 'ActivitatController@Delete', 'as' => 'admin.activitats.delete']);
    Route::post('/activitats/publish/{id}',['uses'=>'ActivitatController@Publish','as'=>'admin.activitats.publish']);
    Route::post('/activitats/unpublish/{id}',['uses'=>'ActivitatController@UnPublish','as'=>'admin.activitats.unpublish']);
});
Route::get('/clear/cache', 'AdminController@clearCache');