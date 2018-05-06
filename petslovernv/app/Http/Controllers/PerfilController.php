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

    public function alterarDadosLogin(Request $request)
    {   
        $login = new Login();
        $user = new Usuario();

        $message = array();

        $novo_email = $request->input('tnm_email');
        $senhaAtual = $request->input('senha_atual');
        $nova_senha = $request->input('nsenha');
        $nome = $request->input('tnm_usuario');
        $cep = $request->input('tcd_cep');

        #Variável setada para excluir o usuário
        $command = $request->input('cmd');
        
        #Tenta pegar o usuário setado
        if($request->session()->has('usuario')){
            $usuario = $request->session()->get('usuario');
        }

        # Caso o botão de exclusão for acionado, o usuário será excluído.
        if($command == 'Excluir'){

            $user->excluirUsuario($usuario->cdUsuario);

            #Verificar por que não está redirecionando para a pagina inicial
            $this->logout($request);
        }

        if(!empty($nome) && !is_null($nome)){
            $status = $user->alterarNome($nome, $usuario->cdUsuario);
        }

        if(!empty($cep) && !is_null($cep)){
            $status = $user->alterarCep($cep, $usuario->cdUsuario);
        }

        if(!empty($novo_email) && !is_null($novo_email)){
            # Método para adicionar um novo email a tabela de Login
            # e atribuir o código do usuário e a senha para este novo e-mail.
            $status = $login->alterarEmail($usuario->nmEmail, $novo_email, $usuario->cdUsuario);

            //Dar um jeito de dar um reload na sessão para atualizar o e-mail na pag. de perfil
            if($status){
                array_push($message, "E-mail alterado com sucesso!");
            }else{
                array_push($message, "E-mail já existe.");
            }
        }

        # Método para alterar a senha
        if(!empty($nova_senha) && !is_null($nova_senha)){

            $status = $login
                            ->alterarSenha($usuario->nmEmail, 
                                                $senhaAtual, 
                                                $nova_senha, 
                                                $usuario->cdUsuario);
            if($status){

                array_push($message, "Senha alterada com sucesso!");

            }else{
                array_push($message, "Senha incorreta");
            }
        }

        //Mostrar a mensagem através de Jquery na view
        /*if(!empty($message)){
            return view('perfil', $message);
        }*/
        return $message;
    }
}
