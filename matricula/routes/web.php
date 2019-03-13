<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/painel/turmas', 'Painel\TurmaController');
Route::resource('/painel/alunos', 'Painel\AlunoController');
Route::resource('/painel/professores', 'Painel\ProfessorController');
