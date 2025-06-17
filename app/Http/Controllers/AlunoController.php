<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlunoRequest;
use App\Services\AlunoService;
use Illuminate\Support\Facades\Log;

use Throwable;

class AlunoController extends Controller
{
    protected $alunoService;

    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }

    public function criarAluno(StoreAlunoRequest $request)
    {
        try {
            Log::info('Teste de log manual');
            $aluno = $this->alunoService->criarAluno($request->validated());
            return response()->json(['message' => 'Aluno cadastrado com sucesso!', 'data' => $aluno], 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Erro interno ao cadastrar aluno.'], 500);
        }
    }
    public function aditarAluno(StoreAlunoRequest $request, int $id)
    {
        try {
            $aluno = $this->alunoService->aditarAluno($request->validated(), $id);
            return response()->json(['message' => 'Aluno atualizado sucesso!', 'data' => $aluno], 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Erro interno ao atualizar aluno.'], 500);
        }
    }
    public function listarAlunos(Request $request)
    {
        try {
            $aluno = $this->alunoService->listarAlunos($request->all());
            return response()->json(['message' => 'Alunos listados sucesso!', 'data' => $aluno], 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Erro interno ao listar aluno.'], 500);
        }
    }
    public function buscarAluno(int $id)
    {
        try {
            $aluno = $this->alunoService->buscarAluno($id);
                return response()->json(['message' => 'Busca realizada com sucesso!', 'data' => $aluno], 201);
            } catch (Throwable $e) {
                return response()->json(['message' => 'Erro interno ao busca aluno.'], 500);
            }
        }
  }
