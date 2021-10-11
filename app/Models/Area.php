<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
        return $this->belongsToMany(Associado::class)->withTimestamps();
    }
}
