
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
//Auth::routes(['register' => false]);
Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware'=>'role:admin'], function() {
        Route::get('/usuaris',['uses'=>'UsersController@index','as'=>'admin.users']);
        Route::get('/usuaris/crear',['uses'=>'UsersController@create','as'=>'admin.users.create']);
        Route::post('/usuaris/guardar', ['uses' => 'UsersController@Store', 'as' => 'admin.users.store']);    
        Route::get('/usuaris/editar/{category}', ['uses' => 'UsersController@Edit', 'as' => 'admin.users.edit']);
        Route::put('/usuaris/editar/{category}', ['uses' => 'UsersController@Update', 'as' => 'admin.users.update']);
        Route::post('/usuaris/eliminar/{id}', ['uses' => 'UsersController@Delete', 'as' => 'admin.users.delete']);        
    });

    Route::get('/', ['uses' => 'AdminController@Index', 'as' => 'admin.home']);   
    Route::get('/portada',['uses'=>'CoverController@Index','as'=>'admin.portada']);
    Route::get('/portada/editar/{cover}', ['uses' => 'CoverController@Edit', 'as' => 'admin.portada.edit']);
    Route::put('/portada/editar/{cover}', ['uses' => 'CoverController@Update', 'as' => 'admin.portada.update']);

    Route::get('/categories',['uses'=>'CategoryController@adminIndex','as'=>'admin.categories']);
    Route::get('/categories/crear',['uses'=>'CategoryController@create','as'=>'admin.categories.create']);
    Route::post('/categories/guardar', ['uses' => 'CategoryController@Store', 'as' => 'admin.categories.store']);    
    Route::get('/categories/editar/{category}', ['uses' => 'CategoryController@Edit', 'as' => 'admin.categories.edit']);
    Route::put('/categories/editar/{category}', ['uses' => 'CategoryController@Update', 'as' => 'admin.categories.update']);
    Route::post('/categories/eliminar/{id}', ['uses' => 'CategoryController@Delete', 'as' => 'admin.categories.delete']);

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