<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//----------------------------------
// Aluno
//----------------------------------
Route::get('/select',[AlunoController::class,'select'])->name('select');
Route::get('/insert',[AlunoController::class,'insert'])->name('insert');
Route::get('/update',[AlunoController::class,'update'])->name('update');
Route::get('/delete',[AlunoController::class,'delete'])->name('delete');
Route::get('/sql',[AlunoController::class,'sql'])->name('sql');

//----------------------------------
// Usuário
//----------------------------------
Route::get("/usuario-form",[UsuariosController::class,'usuarioForm'])->name("usuario-form");
Route::post("/usuario-form-submit",[UsuariosController::class,'usuarioFormSubmit'])->name("usuario-form-submit");
Route::get("/usuario-lista",[UsuariosController::class,'usuarioLista'])->name("usuario-lista");


Route::get("/usuario-edit/{id}",[UsuariosController::class,'usuarioEdit'])->name("usuario-edit");

Route::post("/usuario-edit-submit",[UsuariosController::class,'usuarioEditSubmit'])->name("usuario-edit-submit");