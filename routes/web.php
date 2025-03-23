<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;


// Rota - Index
Route::get('/', function () {
    return view('welcome'); // Caso a view esteja na raiz, n precisa especificar pasta
})->name('welcome');



// Rota - Login
Route::get('/auth/login-instituicao', function () {
    return view('/auth/login-instituicao'); // Caso a view esteja em uma pasta, precisa especificar a pasta
})->name('login-instituicao');


// ROTAS - CONTATO
// -------------------

// Rota - Contato Exibir Form
Route::get('/contato', function () {
    return view('contato');
})->name('contato');

// Rota - Enviar Email
Route::post('/contato/enviar', [ContatoController::class, 'enviar'])->name('contato.enviar');


// ROTAS - INSTITUIÇÃO
// -----------------------
// Rota para exibir o formulário de cadastro
Route::get('/instituicao/cadastrar', [InstituicaoController::class, 'create'])
    ->name('instituicao.create');

// Rota para processar o envio do formulário de cadastro
Route::post('/instituicao/cadastrar', [InstituicaoController::class, 'store'])
    ->name('instituicao.store');

// Rota para indicar o sucesso do cadastro
Route::get('/instituicao/sucess', function () {
    return view('instituicao.sucess');
})->name('instituicao.sucess')
?>