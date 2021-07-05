<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materia;

class AlumnoAluController extends Controller
{
    public function index($id){
        $materia=Materia::find($id);        
        return view('alumno.materias.alumnos.index', compact('materia',$materia));  
    }
}
