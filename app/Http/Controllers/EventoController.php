<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    return view('agendaPer.blade.php');

    public function store(Request $request){
        request()->validate(Evento::$rules);
        $evento=Evento::create($request->all());
          
    }
}

