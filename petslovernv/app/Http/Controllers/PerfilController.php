<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Usuario;
use App\Models\Login;

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

    public function alterarDadosUsuario(Request $request)
    {

    }

    public function alterarDadosLogin()
    {   
        $request = new Request();
        $login = new Login();

        $novo_email = $request->input('');
        $senhaAtual = $request->input('tsenha');
        $nova_senha = $request->input('nsenha');
        
        if($request->session()->has('usuario')){
            $usuario = $request->session()->get('usuario');
        }

        if(!empty($novo_email) && !is_null($novo_email)){
            # Método para adicionar um novo email a tabela de Login
            # e atribuir o código do usuário e a senha para este novo e-mail.
        }

        if(!empty($nova_senha) && !is_null($nova_senha)){
            # Método para alterar a senha

            $status = $login
                            ->alterarDadosLogin($usuario->nmEmail, 
                                                $senhaAtual, 
                                                $nova_senha, 
                                                $usuario->cdUsuario);

            echo $status;
        }
    }
}
