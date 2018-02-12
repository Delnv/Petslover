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

    public function cadastrar(Request $request){

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

        //Necessário ainda retornar ao usuário quando o arquivo é inválido.
        $fileNames = '';
        if($request->hasFile('userFile')){
            $userFile = $request->file('userFile');
            $fileNames = self::upload($userFile);
        }

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

        if($fileNames != false){
            $imgPet = $this->imgPet;     
            $imgPet->cadastrarImagem($cdPet, $fileNames);
        }

    	if($login == TRUE and $cdPet != 0){

    		return "Cadastro efetuado com sucesso!";

    	}else{

    		return "Não foi possível completar o seu cadastro.";

    	}
    }

    //Metodo para fazer o upload de imagens, tratar e enviar os arrays com os nomes das imgs
    //Verificar posteriormente a necessidade de gravar o nome junto com o caminho.
    private function upload($files)
    {
        $destinationPath = public_path() . '/image/pet_photo';
        $count = 0;
        $fileNames = array();

        /* Verifica se o tipo mime do arquivo é de imagem.
            Gera um nome aleatorio para a imagem com base no nome original
            e move o arquivo para a pasta.
            Coloca os nomes gerados em um array que será retornado.
        */
        foreach($files as $file){
            //Codificar para que este tipo de verificação ocorra também por meio de jquery
            if($file->getMimeType() == 'image/png' or $file->getMimeType() == 'image/jpeg'){
                $filename = sha1($file->getClientOriginalName()).date('Y-m-d-h-i-s').'.'.$file->guessExtension();
                $file->move($destinationPath, $filename);
                $fileNames[$count] = 'image/pet/'.$filename;
                $count++;
            }else{
                return false;
            }
        }

        return $fileNames;
    }
}