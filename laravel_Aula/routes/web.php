<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;




//----------------------------------
// Aluno
//----------------------------------
Route::get('/select', [AlunoController::class, 'select'])->name('select');
Route::get('/insert', [AlunoController::class, 'insert'])->name('insert');
Route::get('/update', [AlunoController::class, 'update'])->name('update');
Route::get('/delete', [AlunoController::class, 'delete'])->name('delete');
Route::get('/sql', [AlunoController::class, 'sql'])->name('sql');



//----------------------------
// Rotas sem autenticação
//----------------------------
Route::get('/index', function () {
    return view('welcome');
});


Route::get('/', [AutenticacaoController::class, 'loginForm'])->name('loginForm');


Route::post('/login-form-submit', [AutenticacaoController::class, 'loginFormSubmit'])->name('loginFormSubmit');

Route::get("/usuario-form", [UsuariosController::class, 'usuarioForm'])->name("usuario-form");

Route::post("/usuario-form-submit", [UsuariosController::class, 'usuarioFormSubmit'])->name("usuario-form-submit");


//----------------------------
// Rotas com autenticação
//----------------------------
Route::middleware(['autenticacao'])->group(function () {

    Route::get("/usuario-lista", [UsuariosController::class, 'usuarioLista'])->name("usuario-lista");


    Route::get("/usuario-edit/{id}", [UsuariosController::class, 'usuarioEdit'])->name("usuario-edit");

    Route::post("/usuario-edit-submit", [UsuariosController::class, 'usuarioEditSubmit'])->name("usuario-edit-submit");

    Route::get("/usuario-delete/{id}", [UsuariosController::class, 'usuarioDelete'])->name("usuario-delete");

    Route::get("/usuario-delete-submit/{id}", [UsuariosController::class, 'usuarioDeleteSubmit'])->name("usuario-delete-submit");

    Route::get(
        "/logout",
        [AutenticacaoController::class, 'logout']
    )->name("logout");

    //-----------------------------
    // Rotas de produtos
    //-----------------------------
    Route::get("/produto-form", [ProdutosController::class, 'produtoForm'])->name("produtoForm");
    
    Route::post("/produto-form-submit", [ProdutosController::class, 'produtoFormSubmit'])->name("produtoFormSubmit");

});















