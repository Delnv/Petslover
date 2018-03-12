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

    public function cadastrarUsuario($nmUsuario, $cdCep, $tipoUsuario, $imgUsuario)
    {

    	$cdUsuario = 0;

    	$this->nmUsuario = $nmUsuario;
    	$this->cdCep = $cdCep;
    	$this->nmTipo = $tipoUsuario;

        /**
            Caso o usuário não insira foto, não será cadastrada no banco.
            A foto padrão será exibida diretamente da pasta no perfil do 
            usuário.
        */
        if(isset($imgUsuario)){
            //return $imgUsuario;
            $this->imgUsuario = $imgUsuario;
        }

    	if($this->save()){

    		$cdUsuario = $this->cdUsuario;

    	}

    	return $cdUsuario;
    }

    public function selecionarUsuario($cdUsuario)
    {
        /**
            Alimenta um array com os dados do usuário
            de acordo com o codigo recebido.
        */
        $usuario = self::where('cdUsuario', $cdUsuario)->first();

        return $usuario;
    }
}
