<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'municipio_id'
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }


    public function associados() {
        return $this->hasMany(Associado::class);
    }

    public function companhias(){
        return $this->hasMany(Companhia::class);
    }

    public function pontocoletas(){
        return $this->hasMany(Pontocoleta::class);
    }

    /*
    public function associados() {
        return $this->belongsToMany(Associado::class)->withTimestamps();
    }
    */




    // relatorio excel e csv
    public static function getBairros(){
        $records = DB::table('bairros')->select('id', 'nome')->get()->toArray();
        return $records;
    }
}
