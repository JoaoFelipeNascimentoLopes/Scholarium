<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthInstituicao;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Session;

// Rota - Index
Route::get('/', function () {
    return view('welcome'); // Caso a view esteja na raiz, n precisa especificar pasta
})->name('welcome');
// web.php



// ROTAS - Auth
// -------------------

// Rota exibir formulário de login
Route::get('/auth/login', function () {
    return view('/auth/login'); // Caso a view esteja em uma pasta, precisa especificar a pasta
})->name('login');

// Rota para enviar o formulário de login
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');

// Rota para logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//


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
})->name('instituicao.sucess');

// Rota para a Dashboard da Instituição com Middleware aplicado
Route::get('/instituicao/dashboard', function () {
    return view('instituicao.dashboard');
})->name('instituicao.dashboard')->middleware(AuthInstituicao::class);

// Rota para Dashboard de Estudantes - Instituição
Route::get('/instituicao/estudantes', function () {
    return view('instituicao.estudantes');
})->name('instituicao.estudantes')->middleware(AuthInstituicao::class);

// Rota para a Dashboard de Disciplina - Instituição
Route::get('/instituicao/disciplinas', function () {
    return view('instituicao.disciplinas');
})->name('instituicao.disciplinas')->middleware(AuthInstituicao::class);

// Rota para a Dashboard de Professores - Instituição
Route::get('/instituicao/professores', function () {
    return view('instituicao.professores');
})->name('instituicao.professores')->middleware(AuthInstituicao::class);

// Rota para a Dashboard de Turmas - Instituição
Route::get('/instituicao/turmas', function () {
    return view('instituicao.turmas');
})->name('instituicao.turmas')->middleware(AuthInstituicao::class);

// Rota para a Dashboard de Configurações - Instituição
Route::get('/instituicao/configuracoes', [InstituicaoController::class, 'configuracoes'])
    ->name('instituicao.configuracoes')
    ->middleware(AuthInstituicao::class);


// ROTAS - PROFESSOR
// -----------------

// Rota para a Dashboard de Professor

Route::get('/professor/dashboard', function() {
    return view('/professor/dashboard');
})->name('professor.dashboard');

// ROTAS - ESTUDANTE
// -----------------

// Rota para a Dashboard de Estudante

Route::get('/estudante/dashboard', function() {
    return view('/estudante/dashboard');
})->name('estudante.dashboard');