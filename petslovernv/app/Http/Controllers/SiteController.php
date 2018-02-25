<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request){
        //Se já houver um usuário logado vai para a pagina de perfil
        if($request->session()->has('usuario')){
            //return redirect('/perfil');
        }
    	//Enviar para a página principal
    	return view('index');
    }

    //Usar para ir adicionando as paginas do layout principal. Uso para testar
    public function pginicial(){
        return view('welcome');
    }
}
