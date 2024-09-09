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
        $categoriaTrabalho = DB::table('categorias')->where('nome', 'Trabalho')->first();
        $categoriaEstudos = DB::table('categorias')->where('nome', 'Estudos')->first();

        DB::table('tarefas')->insert([
            [
                'titulo' => 'Finalizar relatório',
                'descricao' => 'Concluir o relatório mensal de desempenho.',
                'status' => 'PENDENTE',
                'categoria_id' => $categoriaTrabalho->id,
                'prioridade' => 'ALTA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Estudar para prova',
                'descricao' => 'Revisar o conteúdo de matemática para a prova de sexta-feira.',
                'status' => 'PENDENTE',
                'categoria_id' => $categoriaEstudos->id,
                'prioridade' => 'MEDIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Reunião com cliente',
                'descricao' => 'Reunião de planejamento com o cliente XYZ.',
                'status' => 'CONCLUIDA',
                'categoria_id' => $categoriaTrabalho->id,
                'prioridade' => 'ALTA',
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
        DB::table('tarefas')->whereIn('titulo', ['Finalizar relatório', 'Estudar para prova', 'Reunião com cliente'])->delete();
    }
};
