<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemPet extends Model
{
   	// Tabela associada a Model
    protected $table = 'imagem_pet';
    // Setar a primary key 
    protected $primaryKey = 'cdImgPet';
    //Não usar as colunas gerenciadas pelo Eloquent (created_at/updated_at)
    public $timestamps = false;

    //Grava as imagens no banco de dados acrescentando o id do pet
    //Está gravando somente a primeira imagem - verificar
    public function cadastrarImagem($cdPet, $imgsPet)
    {        
        $data = array();
        for($i = 0; $i < count($imgsPet); $i++) {
            $data[$i] = ['nmImgPet' => $imgsPet[$i], 'cdPet' => $cdPet];
        }

        $this->insert($data);
    }

    public function listarImagemPet()
    {
        //Trazer a primeira imagem e o código do pet
        //Mais para frente o doador irá selecionar qual imagem 
        //ele quer deixar como principal na galeria e a função deve pegar esta imagem.
        $listaImagem = self::select('cdPet', 'nmImgPet')->get();

        return $listaImagem;
    }
}
