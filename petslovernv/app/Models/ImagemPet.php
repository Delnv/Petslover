<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemPet extends Model
{
   	// Tabela associada a Model
    protected $table = 'imagem_pet';
    // Setar a primary key 
    protected $primaryKey = 'cdImagemPet';
    //Não usar as colunas gerenciadas pelo Eloquent (created_at/updated_at)
    public $timestamps = false;

    //Recebe os nomes das imagens como arrays
    public function cadastrarImagem($cdPet, $imgsPet = array("nome_padrao"))
    {
    	$caminho = 'C:\wamp64\www\Delnv5\image-server\NovoPets\pets\\';

    	var $i = 0;
    	foreach ($imgsPet as &$img) {
    		$img = $caminho.$img;
    		unset($img);
    	}

    }
}
