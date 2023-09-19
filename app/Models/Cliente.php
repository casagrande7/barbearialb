<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable =[
        'Nome',
        'Celular',
        'Email',
        'CPF',
        'DataNascimento',
        'Cidade',
        'Estado',
        'País',
        'Rua',
        'Número',
        'Bairro',
        'CEP',
        'Complemento',
        'Senha',
    ];
}
