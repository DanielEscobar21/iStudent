<?php

namespace App\Http\Controllers\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Clase;
use App\Models\Post;
use App\Models\User;

class MateriaAluController extends Controller
{
    public function index(){
        $users = User::find(auth()->user()->id);
        return view('alumno.materias.index', compact('users',$users));  
    }


    public function show($id){
        $materia=Materia::find($id);
        $clases = Clase::all()->where('materia_id', $id);
        $posts = Post::all()->where('materia_id', $id);
        return view('alumno.materias.show', compact('materia',$materia,'clases','posts'));
    }

    public function edit(Materia $materia){
        return view('alumno.materias.edit',compact('materia'));
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
        return redirect()->route('alumno.materias.show',$materia);
    }

    public function destroy(Materia $materia){
        $materia->delete();
        return redirect()->route('alumno.materias.index');
    }

    /*public function alumno($id){
        $user=User::orderby('name', 'asc')->where('role','1')->paginate(30);
        $materia=Materia::find($id);
        return view('alumno.materias.alumno', compact('materia','user'));
    }*/
}
