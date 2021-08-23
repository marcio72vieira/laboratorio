<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nascimento',
        'rg',
        'rgorgaoemissor',
        'cpf',
        'sexo',
        'racacor',
        'filiacao',
        'quantidade',
        'endereco',
        'numero',
        'bairro_id',
        'complemento',
        'municipio_id',
        'zona',
        'foneum',
        'fonedois',
        'companhia_id',
        'imagem'
    ];
}
