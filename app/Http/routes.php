<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function(){

    Route::get('/', function(){
        return redirect('resi');
    });

    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');
    
    Route::get('register', function() {
        return redirect('/');
    });

    Route::get('resi/cari', 'ResiController@cari');
    Route::get('ongkir/cari', 'ResiController@cariOngkir');
    Route::get('importexport', 'ResiController@importExport');
    Route::post('importresi', 'ResiController@importExcel');
    Route::get('exportresi', 'ResiController@exportExcel');
    Route::get('/resi', 'ResiController@index');
    Route::get('/resi/create', 'ResiController@create');
    Route::get('/resi/{resi}', 'ResiController@show');
    Route::post('resi', 'ResiController@store');
    Route::get('resi/{resi}/edit', 'ResiController@edit');
    Route::patch('resi/{resi}', 'ResiController@update');
    Route::delete('resi/{resi}', 'ResiController@destroy');
    Route::get('/ongkir', 'ResiController@ongkir');
    Route::get('laporan', 'LaporanController@index');
    Route::get('laporan/customtanggal', 'LaporanController@customTanggal');
    Route::get('test', 'ResiController@chart');
    Route::delete('resi/deleteall', 'ResiController@deleteall');
});