<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clase;
use App\Models\Materia;

class DashboardAluController extends Controller
{
    public function index($id)
    {       
        return view('alumno.dashboard');  
    }
}
