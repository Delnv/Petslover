<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Tabela associada a Model
    protected $table = 'usuario';
    // Setar a primary key 
    protected $primaryKey = 'cdUsuario';
    //Não usar as colunas gerenciadas pelo Eloquent
    public $timestamps = false;

    public function cadastrarUsuario($nmUsuario, $cdCep, $tipoUsuario, $imgUsuario = 'nome_padrao')
    {

    	$urlFoto = "C:\wamp64\www\Delnv5\image-server\NovoPets\\";
    	$imgUsuario = $urlFoto . $imgUsuario;

    	$cdUsuario = 0;

    	$this->nmUsuario = $nmUsuario;
    	$this->cdCep = $cdCep;
    	$this->nmTipo = $tipoUsuario;
    	$this->imgUsuario = $imgUsuario;

    	if($this->save()){

    		$cdUsuario = $this->cdUsuario;

    	}

    	return $cdUsuario;
    }
}
