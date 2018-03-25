<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PerfilController extends Controller
{
    //
    public function index(Request $request, Pet $pet)
    {

    	//Verificar se existe uma sessão
    	if($request->session()->has('usuario')){

    		$user = $request->session()->get('usuario');

            //Pegar os dados do pet
            $pet = $pet->selecionarPetUsuario($user->cdUsuario);
            
            /**
                Caso o pet não tenha uma imagem, é definida uma imagem
                padrão para o pet.    
            */
            if(is_null($pet['nmImgPet']) OR empty($pet['nmImgPet'])){
                $pet['nmImgPet'] = 'image/pet/padrao.png';
            }

    	}else{

    		//Em caso de a sessão não existir, redireciona para a home
    		return redirect('/');
    	}

    	return view('perfil', ['usuario' => $user, 
                                'pet' => $pet]);
        //return view('index', ['usuario' => $user]);
        //return view('index');
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('usuario');

        return redirect('/');
    }
}
