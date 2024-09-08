<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');

// Exibe o formulário para criar uma nova tarefa
Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');

// Armazena uma nova tarefa
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');

// Exibe uma tarefa específica
Route::get('/tarefas/{tarefa}', [TarefaController::class, 'show'])->name('tarefas.show');

// Exibe o formulário de edição de uma tarefa
Route::get('/tarefas/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');

// Atualiza uma tarefa existente
Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');

// Exclui uma tarefa
Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');