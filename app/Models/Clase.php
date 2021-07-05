<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class Clase extends Model
{
    use HasFactory;
    protected $fillable = [
        'diaHoraInicial',
        'diaHoraFinal',
        'linkUrl',
        'informacion',
        'tema',
        'unidad',
        'materia_id',    
    ];
    
    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
