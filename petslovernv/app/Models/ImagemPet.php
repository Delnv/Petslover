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
    //É necessário ainda implementar para receber mais de uma imagem
    public function cadastrarImagem($cdPet, $imgsPet)
    {
    	$caminho = 'C:\wamp64\www\Delnv5\image-server\NovoPets\pets\\';
        
        //Aqui na verdade deveria ser um array, mas é apenas para teste
        //No caso do array será preciso modificar
        $this->imgPet1 = $caminho . $imgsPet;
        $this->cdPet = $cdPet;

        return $this->save();
    }

    public function listarImagemPet()
    {
        //Trazer a primeira imagem e o código do pet
        //Mais para frente o doador irá selecionar qual imagem 
        //ele quer deixar como principal na galeria e a função deve pegar esta imagem.
        $listaImagem = self::select('cdImagemPet', 'imgPet1')->get();

        return $listaImagem;
    }
}
