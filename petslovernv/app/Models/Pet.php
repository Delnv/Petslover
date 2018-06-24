<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    // Tabela associada a Model
    protected $table = 'pet';
    // Setar a primary key 
    protected $primaryKey = 'cdPet';
    //Não usar as colunas gerenciadas pelo Eloquent (created_at/updated_at)
    public $timestamps = false;

    public function cadastrarPet($nmPet, $nmTipoPet, $icSexoPet, $nmPortePet, 
    								$nmFaixaEtariaPet, $descPet, $cdUsuario)
    {
    	$this->nmPet = $nmPet;
    	$this->nmTipoPet = $nmTipoPet;
    	$this->icSexoPet = $icSexoPet;
    	$this->nmPortePet = $nmPortePet;
    	$this->nmFaixaEtariaPet = $nmFaixaEtariaPet;
    	$this->descPet = $descPet;
    	$this->cdUsuario = $cdUsuario;

    	$cdPet = 0;
    	
    	if($this->save()){
    		$cdPet = $this->cdPet;
    	}

    	return $cdPet;
    }

    /**public function pesquisarPet($nmTipoPet, $icSexoPet, $nmFaixaEtariaPet, $nmPortePet)
    {
        //Verificar se é necessário fazer mais de um
        $pet = self::when($nmTipoPet && $icSexoPet && $nmFaixaEtariaPet && $nmPortePet, 
            function ($query) use ($nmTipoPet, $icSexoPet, $nmFaixaEtariaPet, $nmPortePet){

            }
        )
        $pet = self::where('nmTipoPet', $nmTipoPet)
                    ->where('icSexoPet', $icSexoPet)
                    ->where('nmFaixaEtariaPet', $nmFaixaEtariaPet)
                    ->where('nmPortePet', $nmPortePet)
                    ->get();
    }*/

    /**
        Retorna todos os dados do PET de acordo com o 
        código enviado.
    */
    public function selecionarPet($cdPet)
    {
        $pet = self::where('cdPet', $cdPet)->first();

        return $pet;
    }

    /**
        Fazer o join para pegar os dados do pet e as imagens
        (Preciso entender pq fiz esse código :S)
    */
    public function listarPets(ImagemPet $imgPet)
    {
        $pet = self::join('imagem_pet', 'pet.cdPet', '=', 'imagem_pet.cdPet')
                        ->get();
    }

    /**
        Traz os dados do pet de acordo com o código do usuário
        (Ver a necessidade dessa função - motivo: não é um dia bom para pensar)
        Esse código traz os dados do pet e faz um join na tabela de imagens 
        para trazer também as imagens do(s) pet(s).
        (Analisar como vai funcionar quando o usuário possuir mais de um pet).
    */
    public function selecionarPetUsuario($cdUsuario)
    {
        /**
            É necessário colocar um tratamento para valores nulos no join,
            pois se um valor for nulo ele não retorna o select, pois é nulo.
            --Verificar se existe uma maneira de colocar um método 
            is_null (ex. SQL Server) para caso o valor seja nulo.
            -- Ou verificar se é possível definir um valor default
            -- Verificar o Advanced Join Clauses
        */
        $pet = self::select('pet.cdPet', 'pet.nmPet', 'pet.nmTipoPet', 'pet.icSexoPet'
                        , 'pet.nmPortePet', 'pet.nmFaixaEtariaPet', 'pet.descPet'
                        , 'cdImgPet', 'nmImgPet', 'icMain')
                        ->join('imagem_pet', 'pet.cdPet', '=', 'imagem_pet.cdPet')
                        ->where('cdUsuario', '=',$cdUsuario)
                        ->get();

        return $pet[0];
    }
}
