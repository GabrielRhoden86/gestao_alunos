<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::post('/criar-aluno', action: [AlunoController::class, 'criarAluno']);
Route::patch('/editar-aluno/{id}', [AlunoController::class, 'aditarAluno']);
Route::get('listar-alunos',action: [AlunoController::class, 'listarAlunos']);
Route::get('buscar-aluno/{id}',[AlunoController::class, 'buscarAluno']);