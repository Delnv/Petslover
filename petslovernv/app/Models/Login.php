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
}
