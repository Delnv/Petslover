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
}
