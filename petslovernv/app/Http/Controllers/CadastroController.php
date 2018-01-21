<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Login;
use App\Models\Pet;
use App\Models\ImagemPet;

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
    private $imgPet;

    public function __construct(Usuario $usuario, Login $login, Pet $pet, ImagemPet $imgPet)
    {
    	$this->usuario = $usuario;
    	$this->login = $login;
    	$this->pet = $pet;
        $this->imgPet = $imgPet;
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

        $imgPet = $this->imgPet;                    //O nome está somente para teste
        $imgPet = $imgPet->cadastrarImagem($cdPet, 'nome_padrao');

        // O ideal seria abrir uma transação e confirma-la caso nao houver nenhum erro
        // Caso contrario dar rollback
    	if($login == TRUE and $cdPet != 0 and $imgPet == TRUE){

    		return "Cadastro efetuado com sucesso!";

    	}else{

    		return "Não foi possível completar o seu cadastro.";

    	}
    }

    //Metodo para fazer o upload de imagens e tratar e enviar os arrays com os nomes das imgs
    private function upload()
    {

    }
}
