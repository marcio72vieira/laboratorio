<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Residuo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function pontoscoleta(){
        return $this->belongsToMany(Pontocoleta::class)->withTimestamps();
    }

    public function companhia(){
        return $this->belongsToMany(Companhia::class)->withTimestamps();
    }

    // relatorio excel e csv
    public static function getResiduos(){
        $records = DB::table('residuos')->select('id', 'nome')->get()->toArray();
        return $records;
    }
}
