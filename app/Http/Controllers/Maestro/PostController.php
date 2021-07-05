<?php

namespace App\Http\Controllers\Maestro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Post;
use App\Models\Clase;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $materia=Materia::find($id);
        return view('maestros.materias.posts.create', compact('materia'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $materia=Materia::find($id);
        /*$request->validate([
            'nombre_post'=> 'required',
            'body' => 'required',
            'status' => 'required',
            'unidad' => 'required',
        ]);*/

        $post = Post::create([
            'nombre_post' => $request->nombre_post,
            'body' => $request->body,
            'materia_id' => $id,
            'status' => $request->status,
            'unidad_post' => $request->unidad_post,
            'asunto'=> $request->asunto,
        ]);
        $posts = Post::paginate()->where('materia_id', $id);
        $clases = Clase::all()->where('materia_id', $id);
        return view('maestros.materias.show', compact('materia','clases','posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
