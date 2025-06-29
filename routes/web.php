<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DisciplinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthInstituicao;
use App\Http\Controllers\CursoController;
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

// Esta rota vai receber os dados do formulário de edição e atualizar no banco
Route::put('/instituicao/configuracoes', [InstituicaoController::class, 'updateConfiguracoes'])
    ->name('instituicao.configuracoes.update')
    ->middleware(AuthInstituicao::class);

// ROTAS - CURSOS DENTRO DA INSTITUIÇÃO
// ----------------------------------------


// Rota para exibir o FORMULÁRIO DE CRIAÇÃO de curso
Route::get('/instituicao/cursos', [CursoController::class, 'create'])
    ->name('instituicao.cursos.create')
    ->middleware(AuthInstituicao::class);

// Rota para SALVAR o novo curso no banco
Route::post('/instituicao/cursos', [CursoController::class, 'store'])
    ->name('instituicao.cursos.store')
    ->middleware(AuthInstituicao::class);

Route::get('/reports/cursos/{status}', [RelatorioController::class, 'gerarRelatorioCursos'])
     ->name('reports.cursos');

// Rota para exibir o formulário de edição de um curso específico
Route::get('/instituicao/cursos/{curso}/editar', [CursoController::class, 'edit'])->name('cursos.edit')->middleware(AuthInstituicao::class);

// Rota para salvar as alterações do formulário de edição
Route::put('/instituicao/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update')->middleware(AuthInstituicao::class);

// Rota para excluir um curso
Route::delete('/instituicao/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy')->middleware(AuthInstituicao::class);

// Rota para puxar os dados de um curso específico
Route::get('/api/cursos/{curso}', [CursoController::class, 'getCursoData'])->name('cursos.data')->middleware(AuthInstituicao::class);

Route::get('/cursos/{curso}/total-disciplinas', [CursoController::class, 'getTotalDisciplinas'])->name('cursos.totalDisciplinas')->middleware(AuthInstituicao::class);


// ROTAS - DISCIPLINAS
// -------------------
Route::get('/instituicao/disciplinas', [DisciplinaController::class, 'create'])->name('instituicao.disciplinas_create')->middleware(AuthInstituicao::class);

Route::post('/instituicao/disciplinas', [DisciplinaController::class, 'store'])->name('instituicao.disciplinas.store')->middleware(AuthInstituicao::class);

Route::delete('/instituicao/disciplinas/{disciplina}', [DisciplinaController::class, 'destroy'])->name('disciplina.destroy')->middleware(AuthInstituicao::class);

Route::get('/api/cursos/{curso}/disciplinas', [CursoController::class, 'getDisciplinasDoCurso'])
    ->name('cursos.disciplinas.api')->middleware(AuthInstituicao::class);

// Em routes/web.php
Route::get('/relatorios/disciplinas/{status}', [RelatorioController::class, 'gerarRelatorioDisciplinas'])
    ->name('reports.disciplinas')
    ->middleware(AuthInstituicao::class); // É importante proteger esta rota também

Route::get('/instituicao/disciplinas/{disciplina}/editar', [DisciplinaController::class, 'edit'])->name('disciplinas.edit')->middleware(AuthInstituicao::class);

Route::put('/instituicao/disciplinas/{disciplina}', [DisciplinaController::class, 'update'])->name('disciplinas.update')->middleware(AuthInstituicao::class);

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
