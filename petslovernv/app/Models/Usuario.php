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
}
