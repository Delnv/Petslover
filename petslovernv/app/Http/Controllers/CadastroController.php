<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Login;
use App\Models\Pet;

class CadastroController extends Controller
{
	/*
		Verificar a real funcionalidade dos atributos e do construtor
		na utilização do controller de cadastro é realmente necessário
		inicializar todos os atributos (construtor)? 
		Ou somente em cada função?
	*/
    private $usuario;
    private $login;
    private $pet;

    public function __construct(Usuario $usuario, Login $login, Pet $pet)
    {
    	$this->usuario = $usuario;
    	$this->login = $login;
    	$this->pet = $pet;
    }

    public function index(){

    	return view('cadastro');
    }

    public function cadastrar(){

        //Utilizar o request
    	//Receber dados via POST
    	$nmUsuario = $_POST['nmUsuario'];
    	$cdCep = $_POST['cdCep'];
    	//$tipoUsuario = $_POST[''];
    	$nmEmail = $_POST['nmEmail'];
    	$nmSenha = $_POST['nmSenha'];
    	$nmPet = $_POST['mnPet'];
    	$nmTipoPet = $_POST['tipoPet'];
    	$icSexoPet = $_POST['sexoPet'];
    	$nmPortePet = $_POST['portePet'];
    	$nmFaixaEtariaPet = $_POST['faixaEtaria'];
    	$descPet = $_POST['descPet'];

    	//Acrescentar os outros atributos
    	/*
   		* Tratar o tipo de usuário através da rota
   		* Tratar a imagem - validações - e - nome aleatorio, junto com o caminho
   		* Direcionar o arquivo de imagem para uma pasta (a verificar)
   		*/

        $user = $this->usuario;
    	$cdUsuario = $user->cadastrarUsuario($nmUsuario, $cdCep, 'doador');

    	if($cdUsuario == 0){
    		
    		return "Erro ao se cadastrar";

    	}

        $login = $this->login;
    	$login = $login->cadastrarLogin($nmEmail, $nmSenha, $cdUsuario);

        $pet = $this->pet;
    	$cdPet = $pet->cadastrarPet($nmPet, $nmTipoPet, $icSexoPet, $nmPortePet, 
    						$nmFaixaEtariaPet, $descPet, $cdUsuario);

    	if($login == TRUE and $cdPet != 0){

    		return "Cadastro efetuado com sucesso!";

    	}else{

    		return "Não foi possível completar o seu cadastro.";

    	}
    }
}
