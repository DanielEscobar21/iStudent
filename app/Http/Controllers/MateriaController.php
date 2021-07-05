<?php

namespace App\Http\Controllers;
use App\Models\Materia;
use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Post;

class MateriaController extends Controller
{
    public function index(){
        $materias = Materia::orderby('id','desc')->where('id_user', auth()->user()->id)->paginate();
        return view('maestros.materias.index', compact('materias'));  
    }

    public function create(){
        
    }
    public function store(Request $request){
        $request->validate([
            'nombre_materia'=> 'required',
            'clave_materia' => 'required',
        ]);

        $materia = Materia::create([
            'nombre_materia' => $request->nombre_materia,
            'clave_materia' => $request->clave_materia,
            'id_user' => auth()->user()->id,
            'descripcion'=> $request->descripcion,
        ]);
        return redirect()->route('maestros.materias.index'  );
    }


    public function show($id){
        $materia=Materia::find($id);
        $clases = Clase::all()->where('materia_id', $id);
        $posts = Post::all()->where('materia_id', $id);
        return view('maestros.materias.show', compact('materia',$materia,'clases','posts'));
    }

    public function edit(Materia $materia){
        return view('maestros.materias.edit',compact('materia'));
    }

    public function update(Request $request, Materia $materia){
        $request->validate([
            'nombre_materia'=> 'required',
            'clave_materia' => 'required',
            'cantUni' => 'integer',
            'maxAlu' => 'integer',
        ]);

        $materia->update([
            'nombre_materia' => $request->nombre_materia,
            'clave_materia' => $request->clave_materia,
            'id_user' => auth()->user()->id,
            'descripcion'=> $request->descripcion,
            'cantUni'=> $request->cantUni,
            'maxAlu' => $request->maxAlu,
        ]);
        return redirect()->route('maestros.materias.show',$materia);
    }

    public function destroy(Materia $materia){
        $materia->delete();
        return redirect()->route('maestros.materias.index');
    }

    /*public function alumno($id){
        $user=User::orderby('name', 'asc')->where('role','1')->paginate(30);
        $materia=Materia::find($id);
        return view('maestros.materias.alumno', compact('materia','user'));
    }*/

}
