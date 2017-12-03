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
}
