<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Clase;

class ClaseAluController extends Controller
{
    public function index($id)
    {
        $clases = Clase::all()->where('materia_id', $id);
        $materia=Materia::find($id);        
        return view('alumno.materias.clases.index', compact('materia','clases'));  
    }
    public function create($id)
    {   
        $materia=Materia::find($id);
        return view('alumno.materias.clases.create', compact('materia'));  
    }
    public function store($id, Request $request)
    {
        $materia=Materia::find($id);
        $request->validate([
            'diaHoraInicial'=> 'required',
            'diaHoraFinal' => 'required',
            'tema' => 'required',
            'diaHoraFinal' => 'required',
            'diaHoraFinal' => 'required',
        ]);

        $clase = Clase::create([
            'diaHoraInicial' => $request->diaHoraInicial,
            'diaHoraFinal' => $request->diaHoraFinal,
            'materia_id' => $id,
            'linkUrl' => $request->linkUrl,
            'linkUrl' => $request->linkUrl,
            'tema' => $request->tema,
            'unidad' => $request->unidad,
            'descripcion'=> $request->descripcion,
        ]);
        $clases = Clase::all()->where('materia_id', $id);
        return view('alumno.materias.clases.index', compact('materia','clases')); 
    }

    public function show($idMat,$id)
    {   
        $materia = Materia::find($idMat);
        $clase = Clase::find($id);
        return view('alumno.materias.clases.show', compact('materia','clase'));   
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
