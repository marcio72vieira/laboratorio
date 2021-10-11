<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companhia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cnpj',
        'fundacao',
        'foneum',
        'fonedois',
        'presidente',
        'fonepresidente',
        'vicepresidente',
        'fonevicepresidente',
        'endereco',
        'numero',
        'bairro_id',
        'complemento',
        'municipio_id',
        'zona',
    ];

    public function associados() {
        return $this->hasMany(Associado::class);
    }

    public function residuos(){
        return $this->belongsToMany(Residuo::class)->withTimestamps();
    }

    public function bairro(){
        return $this->belongsTo(Bairro::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function pontocoletas(){
        return $this->hasMany(Pontocoleta::class);
    }

    // relatorio excel e csv
    public static function getCompanhias(){
        /* Obtendo os dados dados sem relacionamento
            $records = DB::table('companhias')->select('id', 'nome', 'cnpj', 'fundacao', 'foneum', 'fonedois', 'presidente', 'fonepresidente', 'vicepresidente', 'fonevicepresidente', 'endereco', 'numero', 'bairro_id', 'complemento', 'municipio_id', 'zona')->get()->toArray();
        */

        /* Dados para arquivos xlsx e csv a partir dos dados de COMPANHIAS, BAIRROS, MUNICIPIOS e COMPANHIA_RESIDUOS
           OBS: A linha com o nome da COMPANHIA irá se repetir de acordo com a quantidade de RESIDUOS com que essa trabalha

           OBS: Tabelas cujos campos possuem o mesmo nome, (Ex. 'nome'), devem obrigatoriamente receberem outra nomenclatura
                nomenclatura com o auxílio da palavra reservada 'AS' para que o resultado da "query" não seja confusa
        */
        $records = DB::table('companhias')
                        ->join('bairros', 'bairros.id', '=', 'companhias.bairro_id')
                        ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
                        ->join('companhia_residuo', 'companhia_residuo.companhia_id', '=', 'companhias.id')
                        ->join('residuos', 'residuos.id', '=', 'companhia_residuo.residuo_id')
                        ->select('companhias.id', 'companhias.nome', 'companhias.cnpj', 'companhias.fundacao',
                                    'companhias.foneum', 'companhias.fonedois', 'companhias.presidente',
                                    'companhias.fonepresidente', 'companhias.vicepresidente', 'companhias.fonevicepresidente',
                                    'companhias.endereco', 'companhias.numero', 'bairros.nome AS nomebairro',
                                    'companhias.complemento', 'municipios.nome AS nomemunicipio', 'companhias.zona',
                                    'residuos.nome AS nomeresiduo')
                        ->orderBy('companhias.nome', 'ASC')
                        ->orderBy('residuos.nome', 'ASC')
                        ->get()->toArray();
        return $records;
    }
}
