<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'nombre_post',
        'body',
        'status',
        'unidad_post',
        'materia_id',
        'asunto',    
    ];
    
    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
