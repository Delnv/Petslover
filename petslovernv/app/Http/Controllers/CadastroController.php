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
        
    	//Recebe os dados via POST
    	$nmUsuario = $request->input('tnmprot');
    	$cdCep = $request->input('tcep');
    	//$tipoUsuario = $_POST[''];
    	$nmEmail = $request->input('temail');
    	$nmSenha = $request->input('tsenha');
    	$nmPet = $request->input('tnmpet');
    	$nmTipoPet = $request->input('tipo');
    	$icSexoPet = $request->input('sexo');
    	$nmPortePet = $request->input('selporte');
    	$nmFaixaEtariaPet = $request->input('dtnasc');
    	$descPet = $request->input('asobre');

        //Pegar a imagem do usuário
        $userFileName = NULL;
        if($request->hasFile('userFile')){
            $userFile = $request->file('userFile');
            $userFileName = self::upload($userFile, '/image/user_photo');
        }

        //Necessário ainda retornar ao usuário quando o arquivo é inválido.
        $fileNames = false; //Definido como false temporariamente.
        if($request->hasFile('petFile')){
            $petFile = $request->file('petFile');
            $fileNames = self::upload($petFile);  
        }

    	//Acrescentar os outros atributos
    	/*
   		* Tratar o tipo de usuário através da rota
   		* Tratar a imagem 
   		*/

        $user = $this->usuario;
    	$cdUsuario = $user->cadastrarUsuario($nmUsuario, $cdCep, 'doador', $userFileName);

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
    //Caso não especificado a pasta para armazenar, será armazenado na pasta do pet.
    private function upload($files, $pasta = '/image/pet')
    {
        $destinationPath = public_path() . $pasta;
        $fileNames = array();     

        /* Verifica o tipo mime do arquivo de imagem.
            Gera um nome aleatorio para a imagem com base no nome original
            e move o arquivo para a pasta.
            Coloca os nomes gerados em um array que será retornado.
        */
        for($i=0; $i<count($files); $i++){
            //Codificar para que este tipo de verificação ocorra também por meio de jquery
            if($files[$i]->getMimeType() == 'image/png' or $files[$i]->getMimeType() == 'image/jpeg'){
                $filename = sha1($files[$i]->getClientOriginalName()).date('Y-m-d-h-i-s').'.'.$files[$i]->guessExtension();
                $files[$i]->move($destinationPath, $filename);
                $fileNames[$i] = 'image/pet/'.$filename;
            }else{
                return false;
            }
        }

        /**
            Caso seja a foto do usuario, o array seja convertido em string.
        */
        if(count($fileNames)==1){
            $fileNames = implode($fileNames);
        }

        return $fileNames;
    }
}