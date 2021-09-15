<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function companhias() {
        return $this->hasMany(Companhia::class);
    }

    public function associados() {
        return $this->hasMany(Associado::class);
    }

    public function bairros(){
        return $this->hasMany(Bairro::class);
    }

    public function areas(){
        return $this->hasMany(Areas::class);
    }

    public function pontocoletas(){
        return $this->hasMany(Pontocoleta::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    // relatorio excel e csv
    public static function getMunicipios(){
        $records = DB::table('municipios')->select('id', 'nome')->get()->toArray();
        return $records;
    }
}
