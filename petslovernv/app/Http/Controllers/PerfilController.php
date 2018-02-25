<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //
    public function index(Request $request)
    {

    	//Verificar se existe uma sessão
    	if($request->session()->has('usuario')){

    		$user = $request->session()->get('usuario');

    	}else{

    		//Em caso de a sessão não existir, redireciona para a home
    		return redirect('/');
    	}

    	return view('perfil', ['usuario' => $user]);
        //return view('index', ['usuario' => $user]);
        //return view('index');
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('usuario');

        return redirect('/');
    }
}
