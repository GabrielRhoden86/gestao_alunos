<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class NotificacaoService
{
    public function notificarGestorAlteracaoStatus(int $alunoId, string $statusAnterior, string $statusNovo): void
    {    
        Log::info("Notificação para gestor: Aluno [ID {$alunoId}] teve o status alterado de '{$statusAnterior}' para '{$statusNovo}'.");
    }
}
