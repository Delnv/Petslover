<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // Tabela associada a Model
    protected $table = 'login';
    // Setar a primary key 
    protected $primaryKey = 'nmEmail';
    //Não usar as colunas gerenciadas pelo Eloquent (created_at/updated_at)
    public $timestamps = false;
    //Declarar a tabela como não sendo auto-increment
    public $incrementing = false;
    //Declarar a primary key como uma string
    protected $keyType = 'string';

    public function cadastrarLogin($nmEmail, $nmSenha, $cdUsuario)
    {
        $this->nmEmail = $nmEmail;
        $this->nmSenha = $nmSenha;
        $this->cdUsuario = $cdUsuario;
        $insert = $this->save();
        
        return $insert;
    }

    public function logar($nmEmail, $nmSenha)
    {
        //Quando o registro existe, retorna um array contendo 
        //o nome da coluna e o valor.
        $cdUsuario = self::select('cdUsuario')
                            ->where('nmEmail', '=', $nmEmail)
                            ->where('nmSenha', '=', $nmSenha)
                            ->get();

        if(count($cdUsuario) != 0){

            $cdUsuario = $cdUsuario[0]->cdUsuario;

        }else{

            $cdUsuario = 0;
            
        }

        return $cdUsuario;
    }

    public function alterarDadosLogin($email, $senha, $novaSenha, $cdUsuario)
    {
        /**
            Alterar a senha do usuário: 
            Primeiro trazer a senha e comparar com a senha enviada
            caso a senha confira com o valor enviado, altera a senha.
        */

        $senhaAtual = self::select('nmSenha')
                            ->where([
                                      ['nmEmail', '=', $email],
                                      ['cdUsuario', '=', $cdUsuario]
                                    ])
                            ->first();

        if($senhaAtual==$senha){
            $senha = self::where([
                                   ['nmEmail', '=', $email],
                                   ['cdUsuario', '=', $cdUsuario]
                                 ])
                            ->update(['nmSenha' => $novaSenha]);
        }

        return $senha;
    }
}
