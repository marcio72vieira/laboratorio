<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
    	'associado_id',
        'nome',
        'cpf',
        'companhia',
        'foto'
    ];

    public function associado()
    {
        return $this->belongsTo(Associado::class);
    }
}
