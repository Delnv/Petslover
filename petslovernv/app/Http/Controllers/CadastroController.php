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

    //Verificar se esse métodos de cadastro são no controller ou na model
    //Daqui -->
    public function cadastrarUsuario($nmUsuario, $cdCep, $tipoUsuario = 'doador', $imgUsuario = 'caminho_padrao')
    {
    	$user = $this->usuario;
    	$user->nmUsuario = $nmUsuario;
    	$user->cdCep = $cdCep;
    	$user->nmTipo = $tipoUsuario;
    	$user->imgUsuario = $imgUsuario;

    	$cdUsuario = 0;

    	if($user->save()){

    		$cdUsuario = $user->cdUsuario;

    	}

    	return $cdUsuario;
    }

    public function cadastrarLogin($nmEmail, $nmSenha, $cdUsuario)
    {
    	$credenciais = $this->login;
    	$credenciais->nmEmail = $nmEmail;
    	$credenciais->nmSenha = $nmSenha;
    	$credenciais->cdUsuario = $cdUsuario;
    	$insert = $credenciais->save();
    	
    	return $insert;
    }

    public function cadastrarPet($nmPet, $nmTipoPet, $icSexoPet, $nmPortePet, 
    								$nmFaixaEtariaPet, $descPet, $cdUsuario)
    {
    	$pet = $this->pet;
    	$pet->nmPet = $nmPet;
    	$pet->nmTipoPet = $nmTipoPet;
    	$pet->icSexoPet = $icSexoPet;
    	$pet->nmPortePet = $nmPortePet;
    	$pet->nmFaixaEtariaPet = $nmFaixaEtariaPet;
    	$pet->descPet = $descPet;
    	$pet->cdUsuario = $cdUsuario;

    	$cdPet = 0;
    	
    	if($pet->save()){
    		$cdPet = $pet->cdPet;
    	}

    	return $cdPet;
    }
    //<-- Até aqui

    public function cadastrar(){

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
    	$cdUsuario = $this->cadastrarUsuario($nmUsuario, $cdCep, 'doador');

    	if($cdUsuario == 0){
    		
    		return "Erro ao se cadastrar";

    	}

    	$login = $this->cadastrarLogin($nmEmail, $nmSenha, $cdUsuario);

    	$cdPet = $this->cadastrarPet($nmPet, $nmTipoPet, $icSexoPet, $nmPortePet, 
    						$nmFaixaEtariaPet, $descPet, $cdUsuario);

    	if($login == TRUE and $cdPet != 0){

    		return "Cadastro efetuado com sucesso!";

    	}else{

    		return "Não foi possível completar o seu cadastro.";

    	}
    }
}
