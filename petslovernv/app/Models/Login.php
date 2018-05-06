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

    public function alterarEmail($email, $novoEmail, $cdUsuario)
    {
        # Pega a senha antiga
        $senha = $this->getSenhaAtual($email, $cdUsuario);

        # Traz o e-mail, caso seja um novo valor retorna vazio
        $email = $this->getEmailAtual($novoEmail, $cdUsuario);

        # Verificar se a variavel esta vazia, 
        # caso esteja o e-mail pode ser alterado,
        # pois trata-se de um novo e-mail.
        if(is_null($email) OR empty($email)){
            $status = $this->cadastrarLogin($novoEmail, $senha['nmSenha'], $cdUsuario);
            return True;
        }else{
            return False;
        }
    }

    # Método para alterar a senha
    public function alterarSenha($email, $senha, $novaSenha, $cdUsuario)
    {
        /**
            Alterar a senha do usuário: 
            Primeiro trazer a senha e comparar com a senha enviada
            caso a senha confira com o valor enviado, altera a senha.
        */

        $senhaAtual = $this->getSenhaAtual($email, $cdUsuario);

        if($senhaAtual['nmSenha']==$senha){
            $status = self::where([
                          ['nmEmail', '=', $email],
                          ['cdUsuario', '=', $cdUsuario]
                        ])->update(['nmSenha' => $novaSenha]);
            return $status;
        }else{
            return False;
        }
    }

    private function getSenhaAtual($email, $cdUsuario)
    {
        $senhaAtual = self::select('nmSenha')
                            ->where([
                                      ['nmEmail', '=', $email],
                                      ['cdUsuario', '=', $cdUsuario]
                                    ])
                            ->first();

        return $senhaAtual;
    }

    private function getEmailAtual($email, $cdUsuario)
    {
        $email = self::select('nmEmail')
                            ->where([
                                        ['cdUsuario', '=', $cdUsuario],
                                        ['nmEmail', '=', $email]  
                                    ])
                            ->first();

        return $email;
    }
}
