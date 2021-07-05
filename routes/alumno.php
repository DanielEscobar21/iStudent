<?php

use App\Http\Controllers\Alumno\ClaseAluController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alumno\MateriaAluController;
use App\Http\Controllers\Alumno\PostAluController;
use App\Http\Controllers\Alumno\AlumnoAluController;
use App\Http\Controllers\Alumno\DashboardAluController;

Route::get('', [MateriaAluController::class, 'index'])->name('alumnos.home');
Route::get('home',[DashboardAluController::class, 'index'])->name('alumnos.dashboard');
Route::resource('materias', MateriaAluController::class)->names('alumnos.materias');
Route::resource('materias/{id}/clases', ClaseAluController::class)->names('alumnos.materias.clases');
Route::resource('materias/{id}/posts', PostAluController::class)->names('alumnos.materias.posts');
Route::resource('materias/{id}/alumnos', AlumnoAluController::class)->names('alumnos.materias.alumnos');