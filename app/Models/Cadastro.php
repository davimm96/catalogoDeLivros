<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'table_cadastro';
    protected $fillable = [
        'nome', 'email', 'senha'
    ];

    //Esconde senha
    protected $hidden = ['senha'];
}
