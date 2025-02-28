<?php

use Illuminate\Support\Facades\Route;

// Rota - Index
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rota - Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rota - Contato
Route::get('/contato', function () {
    return view('contato');
})->name('contato');

// Rota - Cadastro
Route::get('/cadastrar', function () {
    return view('cadastrar');
})->name('cadastrar');