<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Inserir tarefas de teste para cada usuário
        DB::table('tarefas')->insert([
            [
                'titulo' => 'Tarefa 1 - Usuário 1',
                'descricao' => 'Esta é uma tarefa de exemplo para o Usuário Teste 1.',
                'status' => 'PENDENTE',
                'categoria_id' => 1, // Suponha que a categoria 1 já exista
                'prioridade' => 'ALTA',
                'user_id' => 1, // Associando ao Usuário Teste 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Tarefa 2 - Usuário 2',
                'descricao' => 'Esta é uma tarefa de exemplo para o Usuário Teste 2.',
                'status' => 'CONCLUIDA',
                'categoria_id' => 2, // Suponha que a categoria 2 já exista
                'prioridade' => 'MEDIA',
                'user_id' => 2, // Associando ao Usuário Teste 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Tarefa 3 - Usuário 3',
                'descricao' => 'Esta é uma tarefa de exemplo para o Usuário Teste 3.',
                'status' => 'PENDENTE',
                'categoria_id' => 3, // Suponha que a categoria 3 já exista
                'prioridade' => 'BAIXA',
                'user_id' => 3, // Associando ao Usuário Teste 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deletar as tarefas de teste se a migration for revertida
        DB::table('tarefas')->whereIn('user_id', [1, 2, 3])->delete();
    }
};
