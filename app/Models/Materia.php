<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clase;
use App\Models\Post;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_materia',
        'clave_materia',
        'descripcion',
        'id_user',
        'maxAlu',
        'cantUni',    
    ];

    //Relación Muchos a Muchos
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function clases(){
        return $this->hasMany(Clase::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
