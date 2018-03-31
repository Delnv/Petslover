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

Route::get('/inicial', 'SiteController@pginicial');

Route::get('/cadastrar', 'CadastroController@index');

Route::post('/cadastrar/usuario', 'CadastroController@cadastrar');

Route::post('/logar', 'LoginController@index');

Route::get('/galeria', 'GaleriaController@index');

Route::get('/perfil', 'PerfilController@index');

Route::get('/perfil-cao/{cdPet}', ['uses' => 'GaleriaController@show']);

Route::get('/galeria2', 'GaleriaController@index');

Route::post('/logout', 'PerfilController@logout');

/**
	Verificar uma maneira de chamar os outros métodos de alteração
	de dados nesta mesma URL
*/
Route::post('/editar-perfil', 'PerfilController@alterarDadosLogin');

/**
 Páginas de visualização
 */
Route::get('/contato', function(){
	return view('contato');
});

Route::get('/quem-somos', function(){
	return view('quem_somos');
});

Route::get('/termo-de-uso', function(){
	return view('acordo');
});

Route::get('/perguntas-frequentes', function(){
	return view('perguntas');
});

Route::get('/cadastrar-adotante', function(){
	return view('cadastro-adotante');
});

Route::get('/perfil2', function(){
	return view('perfil2');
});

#Para testes