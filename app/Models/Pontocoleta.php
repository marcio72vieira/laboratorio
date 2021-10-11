<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pontocoleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'companhia_id',
        'endereco',
        'numero',
        'bairro_id',
        'complemento',
        'municipio_id',
        'zona',
    ];

    public function companhia(){
        return $this->belongsTo(Companhia::class);
    }

    public function bairro(){
        return $this->belongsTo(Bairro::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function residuos(){
        return $this->belongsToMany(Residuo::class)->withTimestamps();
    }

    // relatorio excel e csv
    /*
    public static function getPontoscoletaORIGINAL(){
        $records = DB::table('pontocoletas')->select('id', 'nome', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona')->get()->toArray();
        return $records;
    }
    */

    /*
    public static function getPontoscoleta(){
        $records = Pontocoleta::select('pontocoletas.id', 'pontocoletas.nome', 'pontocoletas.endereco', 'pontocoletas.numero', 'pontocoletas.bairro_id', 'pontocoletas.complemento', 'pontocoletas.municipio_id', 'pontocoletas.zona', 'residuos.nome')
                    ->join('residuos', 'pontocoletas.id', '=', 'residuos.id')
                    ->get();
        return $records;
    }
    */

    public static function getPontoscoleta(){
        $records = DB::table('pontocoletas')
                        ->join('bairros','bairros.id', '=', 'pontocoletas.bairro_id')
                        ->join('municipios', 'municipios.id', '=', 'pontocoletas.municipio_id')
                        ->join('companhias', 'companhias.id', '=', 'pontocoletas.companhia_id')
                        ->join('pontocoleta_residuo', 'pontocoleta_residuo.pontocoleta_id', '=', 'pontocoletas.id')
                        ->join('residuos', 'residuos.id', '=', 'pontocoleta_residuo.residuo_id')
                        ->select('pontocoletas.id', 'pontocoletas.nome', 'pontocoletas.endereco', 'pontocoletas.numero',
                                    'bairros.nome AS nomebairro', 'pontocoletas.complemento', 'municipios.nome AS nomemunicipio',
                                    'pontocoletas.zona', 'companhias.nome AS nomecompanhia','residuos.nome AS nomeresiduo')
                        ->orderBy('companhias.nome', 'ASC')
                        ->orderBy('pontocoletas.nome', 'ASC')
                        ->orderBy('residuos.nome', 'ASC')
                        ->get();

        return $records;
    }





    /*
        public static function getPontoscoleta(){
                $records = Pontocoleta::with('bairro', 'municipio', 'companhia', 'residuos')->get();
                return $records;
        }

        EXEMPLO 1
        $data= Model1::select('model1.field_name', 'model1.another_field', 'model2.name')
        ->join('model2', 'model1.fkeymodel2', '=', 'model2.id')
        ->get();


        EXEMPLO 2
        // Fetch a Model1 with Model2 eager loaded.
        $myModel1 = Model1::with('model2')->first();

        // print the name field from Model2 via Model1
        echo $myModel1->model2->name;

    */
}
