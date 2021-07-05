<?php

namespace App\Http\Controllers\Maestro;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index($id){
        $materia=Materia::find($id);        
        return view('maestros.materias.alumnos.index', compact('materia',$materia));  
    }
    
    public function create($id){
        $materia=Materia::find($id);
        $user=User::all()->where('role','1');
        return view('maestros.materias.alumnos.create', compact('materia','user'));
    }

    public function store($id, Request $request){
        $materia = Materia::find($id);
        $materia->users()->attach($request->id);
        return view('maestros.materias.alumnos.index', compact('materia',$materia));    
    }

    public function destroy(){
        
    }
}
