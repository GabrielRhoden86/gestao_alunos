<?php

namespace App\Services;
use Throwable;
use App\Repositories\AlunoRepository;
use Illuminate\Support\Facades\Log;

class AlunoService
{
    protected $alunoRepository;

    public function __construct(AlunoRepository $alunoRepository)
    {
        $this->alunoRepository = $alunoRepository;
    }
    public function criarAluno(array $dados)
    {
        try {
            return $this->alunoRepository->create($dados);
        } catch (Throwable $e) {
            Log::error('Erro ao cadastrar aluno - service: ' . $e->getMessage());
            throw $e;
        }
    }
    public function aditarAluno(array $dados, int $id)
    {
        try {
            return $this->alunoRepository->update( $dados, $id);
        } catch (Throwable $e) {
            Log::error('Erro ao atualizar aluno - service: ' . $e->getMessage());
            throw $e;
        }
    }
    public function listarAlunos(array $filtros = [])
    {
        try {
            return $this->alunoRepository->findAll($filtros);
        } catch (Throwable $e) {
            Log::error('Erro ao listar alunos - service: ' . $e->getMessage());
            throw $e;
        }
    }
    public function buscarAluno($id)
    {
        try {
            return $this->alunoRepository->findById($id);
        } catch (Throwable $e) {
            Log::error('Erro ao buscar aluno - service: ' . $e->getMessage());
            throw $e;
        }
    }
}
