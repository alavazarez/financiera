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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/users/edit', 'UsersController@edit')->name('users.edit');

    Route::post('/users/edit/{id}', 'UsersController@update')->name('users.update');

    Route::post('import-list-excel', 'ClientsController@importExcel')->name('clients.import.excel');

    Route::get('export-pagos-excel', 'PagosController@exportExcel')->name('pagos.excel');

    Route::get('/clients', 'ClientsController@index')->name('clients.index');

    Route::get('/clients/new', 'ClientsController@create')->name('clients.create');

    Route::post('/clients', 'ClientsController@store')-> name('clients.store');
    
    Route::get('/clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');

    Route::post('/clients/edit/{id}', 'ClientsController@update')->name('clients.update');

    Route::delete('/clients/{id}', 'ClientsController@destroy')-> name('clients.destroy');

    Route::get('/prestamos', 'PrestamosController@index')->name('prestamos.index');

    Route::get('/prestamos/new', 'PrestamosController@create')->name('prestamos.create');

    Route::post('/prestamos', 'PrestamosController@store')-> name('prestamos.store');

    Route::get('/prestamos/edit/{id}', 'PrestamosController@edit')->name('prestamos.edit');

    Route::post('/prestamos/edit/{id}', 'PrestamosController@update')->name('prestamos.update');

    Route::delete('/prestamos/{id}', 'PrestamosController@destroy')-> name('prestamos.destroy');

    Route::get('/pagos', 'PagosController@index')->name('pagos.index');

    Route::get('/pagos/{id}', 'PagosController@show')->name('pagos.show');

    Route::post('/pagos/{id}', 'PrestamosController@abonar')->name('pagos.abonar');

});


