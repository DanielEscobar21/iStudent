<?php

use App\Http\Controllers\Maestro\AlumnoController;
use App\Http\Controllers\Maestro\ClaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\Maestro\PostController;

Route::get('', [MateriaController::class, 'index'])->name('maestros.home');
Route::resource('materias', MateriaController::class)->names('maestros.materias');
Route::resource('materias/{id}/alumnos', AlumnoController::class)->names('maestros.materias.alumnos');
Route::resource('materias/{id}/clases', ClaseController::class)->names('maestros.materias.clases');
Route::resource('materias/{id}/posts', PostController::class)->names('maestros.materias.posts');

