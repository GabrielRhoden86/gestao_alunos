<?php

namespace App\Services;
use Throwable;
use App\Enums\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Repositories\AlunoRepository;
use App\Services\NotificacaoService;

class AlunoService
{
    protected $alunoRepository;
    protected $notificacaoService;

    public function __construct(AlunoRepository $alunoRepository, NotificacaoService $notificacaoService)
    {
        $this->alunoRepository = $alunoRepository;
        $this->notificacaoService = $notificacaoService;
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
            $aluno = $this->alunoRepository->findById($id);
            $statusAnterior = $aluno->status;
            $usuario = Auth::user();

            if (isset($dados['status']) && $usuario->perfil === Perfil::FUNCIONARIO->value) {
                throw new \Exception('Funcionários não têm permissão para alterar o status do aluno.');
            }

            $alunoAtualizado = $this->alunoRepository->update($dados, $id);
            $statusNovo = $alunoAtualizado->status;

            // Verifica se o status foi alterado e envia notificação
            if ($statusAnterior !== $statusNovo && in_array($statusNovo, ['Aprovado', 'Cancelado'])) {
                $this->notificacaoService->notificarGestorAlteracaoStatus($id, $statusAnterior, $statusNovo);
            }

            return $alunoAtualizado;
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
