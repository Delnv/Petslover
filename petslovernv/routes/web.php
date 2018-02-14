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

Route::get('/', 'SiteController@index');

Route::get('/teste', 'SiteController@teste');

Route::post('/testeup', 'SiteController@testeUpload');

Route::get('/cadastrar', 'CadastroController@index');

Route::post('/cadastrar/usuario', 'CadastroController@cadastrar');

Route::post('/logar', 'LoginController@index');

Route::get('/galeria', 'GaleriaController@index');

Route::get('/perfil', 'PerfilController@index');

Route::get('/perfil-cao/{cdPet}', ['uses' => 'GaleriaController@show']);